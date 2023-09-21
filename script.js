function calculateFibonacci() {
    const n = parseInt(document.getElementById("fibonacci-input").value);
    if (!isNaN(n) && n >= 0) {
        const result = fibonacci(n);
        document.getElementById("fibonacci-result").textContent = result;
    } else {
        alert("Masukkan angka positif.");
    }
}

function fibonacci(n) {
    if (n <= 1) {
        return n;
    }

    let fibPrev = 0;
    let fibCurrent = 1;

    for (let i = 2; i <= n; i++) {
        const temp = fibCurrent;
        fibCurrent += fibPrev;
        fibPrev = temp;
    }

    return fibCurrent;
}
function calculateVolume() {
    const selectedShape = document.getElementById("shape-select").value;
    const kubusSide = parseFloat(document.getElementById("kubus-side").value);
    const panjangBalok = parseFloat(document.getElementById("balok-panjang").value);
    const lebarBalok = parseFloat(document.getElementById("balok-lebar").value);
    const tinggiBalok = parseFloat(document.getElementById("balok-tinggi").value);
    const bolaRadius = parseFloat(document.getElementById("bola-radius").value);
    const tinggiTabung = parseFloat(document.getElementById("tabung-tinggi").value);
    const tabungRadius = parseFloat(document.getElementById("tabung-radius").value);
    const kerucutRadius = parseFloat(document.getElementById("kerucut-radius").value);
    const kerucutTinggi = parseFloat(document.getElementById("kerucut-tinggi").value);
    const limasAlas = parseFloat(document.getElementById("limas-luas").value);
    const limasTinggi = parseFloat(document.getElementById("limas-tinggi").value);

    if (selectedShape === "kubus" && !isNaN(kubusSide) && kubusSide >= 0) {
        const volume = kubusSide ** 3;
        document.getElementById("volume-result").textContent = `Volume Kubus: ${volume.toFixed(2)}`;
    } 
    else if (selectedShape === "balok" && !isNaN(panjangBalok) && !isNaN(lebarBalok) && !isNaN(tinggiBalok) && panjangBalok >= 0 && lebarBalok >= 0 && tinggiBalok >= 0) {
        const volume = panjangBalok * lebarBalok * tinggiBalok;
        document.getElementById("volume-result").textContent = `Volume Balok: ${volume.toFixed(2)}`;
    } 
    else if (selectedShape === "bola" && !isNaN(bolaRadius) && bolaRadius >= 0) {
        const volume = (4 / 3) * Math.PI * (bolaRadius ** 3);
        document.getElementById("volume-result").textContent = `Volume Bola: ${volume.toFixed(2)}`;
    }
    else if (selectedShape === "tabung" && !isNaN(tabungRadius) && !isNaN(tinggiTabung) && tabungRadius >= 0 && tinggiTabung >= 0) {
        const volume = Math.PI * (tabungRadius ** 2) * tinggiTabung;
        document.getElementById("volume-result").textContent = `Volume Tabung: ${volume.toFixed(2)}`;
    }
    else if (selectedShape === "kerucut" && !isNaN(kerucutRadius) && !isNaN(kerucutTinggi) && kerucutRadius >= 0 && kerucutTinggi >= 0) {
        const volume = (1 / 3) * Math.PI * (kerucutRadius ** 2) * kerucutTinggi;
        document.getElementById("volume-result").textContent = `Volume Kerucut: ${volume.toFixed(2)}`;
    }
    else if (selectedShape === "limas" && !isNaN(limasAlas) && !isNaN(limasTinggi) && limasAlas >= 0 && limasTinggi >= 0) {
        const volume = (1 / 3) * limasAlas * limasTinggi;
        document.getElementById("volume-result").textContent = `Volume Limas: ${volume.toFixed(2)}`;
    }
    else {
        alert("Masukkan angka positif.");
    }
}



document.getElementById("shape-select").addEventListener("change", function () {
    const selectedShape = this.value;
    if (selectedShape === "kubus") {
        document.getElementById("kubus-form").style.display = "block";
        document.getElementById("balok-form").style.display = "none";
        document.getElementById("bola-form").style.display = "none";
        document.getElementById("tabung-form").style.display = "none";
        document.getElementById("kerucut-form").style.display = "none";
        document.getElementById("tabung-form").style.display = "none";
        document.getElementById("limas-form").style.display = "none";
    } 
    else if (selectedShape === "balok") {
        document.getElementById("kubus-form").style.display = "none";
        document.getElementById("balok-form").style.display = "block";
        document.getElementById("bola-form").style.display = "none";
        document.getElementById("tabung-form").style.display = "none";
        document.getElementById("kerucut-form").style.display = "none";
        document.getElementById("limas-form").style.display = "none";
    }
    else if (selectedShape === "bola") {
        document.getElementById("kubus-form").style.display = "none";
        document.getElementById("balok-form").style.display = "none";
        document.getElementById("bola-form").style.display = "block";
        document.getElementById("tabung-form").style.display = "none";
        document.getElementById("kerucut-form").style.display = "none";
        document.getElementById("limas-form").style.display = "none";
    }
    else if (selectedShape === "tabung") {
        document.getElementById("kubus-form").style.display = "none";
        document.getElementById("balok-form").style.display = "none";
        document.getElementById("bola-form").style.display = "none";
        document.getElementById("kerucut-form").style.display = "none";
        document.getElementById("tabung-form").style.display = "block";
        document.getElementById("limas-form").style.display = "none";
    }
    else if (selectedShape === "kerucut") {
        document.getElementById("kubus-form").style.display = "none";
        document.getElementById("balok-form").style.display = "none";
        document.getElementById("bola-form").style.display = "none";
        document.getElementById("kerucut-form").style.display = "block";
        document.getElementById("tabung-form").style.display = "none";
        document.getElementById("limas-form").style.display = "none";
    }
    else if (selectedShape === "limas") {
        document.getElementById("kubus-form").style.display = "none";
        document.getElementById("balok-form").style.display = "none";
        document.getElementById("bola-form").style.display = "none";
        document.getElementById("kerucut-form").style.display = "none";
        document.getElementById("tabung-form").style.display = "none";
        document.getElementById("limas-form").style.display = "block";
    }

    
});
