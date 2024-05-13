const util = (() => {
    const opacity = (nama) => {
        let nm = document.getElementById(nama);
        let op = parseInt(nm.style.opacity);
        let clear = null;

        clear = setInterval(() => {
            if (op >= 0) {
                nm.style.opacity = op.toString();
                op -= 0.025;
            } else {
                clearInterval(clear);
                clear = null;
                nm.remove();
                return;
            }
        }, 10);
    };

    const escapeHtml = (unsafe) => {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    };

    const salin = (btn, msg = "Tersalin", timeout = 1500) => {
        navigator.clipboard.writeText(btn.getAttribute("data-nomer"));

        let tmp = btn.innerHTML;
        btn.innerHTML = msg;
        btn.disabled = true;

        let clear = null;
        clear = setTimeout(() => {
            btn.innerHTML = tmp;
            btn.disabled = false;
            btn.focus();

            clearTimeout(clear);
            clear = null;
            return;
        }, timeout);
    };

    const play = (btn) => {
        if (btn.getAttribute("data-status") !== "true") {
            btn.setAttribute("data-status", "true");
            audio.play();
            btn.innerHTML = '<i class="fa-solid fa-circle-pause"></i>';
        } else {
            btn.setAttribute("data-status", "false");
            audio.pause();
            btn.innerHTML = '<i class="fa-solid fa-circle-play"></i>';
        }
    };

    const modal = (img) => {
        document.getElementById("show-modal-image").src = img.src;
        new bootstrap.Modal("#modal-image").show();
    };

    const tamu = () => {
        let name = new URLSearchParams(window.location.search).get("to");

        if (!name) {
            document.getElementById("nama-tamu").remove();
            return;
        }

        let div = document.createElement("div");
        div.classList.add("m-2");
        div.innerHTML = `<p class="mt-0 mb-1 mx-0 p-0 text-light">Kepada Yth Bapak/Ibu/Saudara/i</p><h2 class="text-light">${escapeHtml(
            name
        )}</h2>`;

        document.getElementById("form-nama").value = name;
        document.getElementById("nama-tamu").appendChild(div);
    };

    const animation = async () => {
        const duration = 10 * 1000;
        const animationEnd = Date.now() + duration;
        let skew = 1;

        let randomInRange = (min, max) => {
            return Math.random() * (max - min) + min;
        };

        (async function frame() {
            const timeLeft = animationEnd - Date.now();
            const ticks = Math.max(200, 500 * (timeLeft / duration));

            skew = Math.max(0.8, skew - 0.001);

            await confetti({
                particleCount: 1,
                startVelocity: 0,
                ticks: ticks,
                origin: {
                    x: Math.random(),
                    y: Math.random() * skew - 0.2,
                },
                colors: ["FFC0CB", "FF69B4", "FF1493", "C71585"],
                shapes: ["heart"],
                gravity: randomInRange(0.5, 1),
                scalar: randomInRange(1, 2),
                drift: randomInRange(-0.5, 0.5),
            });

            if (timeLeft > 0) {
                requestAnimationFrame(frame);
            }
        })();
    };

    const buka = async () => {
        document.querySelector("body").style.overflowY = "scroll";
        AOS.init();
        audio.play();

        opacity("welcome");
        document.getElementById("tombol-musik").style.display = "block";

        await confetti({
            origin: { y: 0.8 },
            zIndex: 1057,
        });
        await session.check();
        await animation();
    };

    return {
        buka: buka,
        tamu: tamu,
        modal: modal,
        play: play,
        salin: salin,
        escapeHtml: escapeHtml,
        opacity: opacity,
    };
})();