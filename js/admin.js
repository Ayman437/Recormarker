function hide(itemId) {
    document.getElementById(itemId).style.display = "none";
}

function show(itemId) {
    document.getElementById(itemId).style.display = "block";
}

function showi(itemId) {
    document.getElementById(itemId).style.display = "inline-block";
}

let codeAA = "";
function chooseOption(optionNum) {
    let inputs = document.querySelectorAll('input[type="radio"]');

    inputs.forEach(input => {
        if (input.value === optionNum) {
            let itemId = input.id;
            let colorBox = document.getElementById(itemId).parentElement;

            let targetColor = '#4CAF50';
            if (itemId.includes("n")) {
                targetColor = "#e73838"; 
            } else if (itemId.includes("d")) {
                targetColor = "#9d0d0d";
            }

            colorBox.style.backgroundColor = targetColor;

            let startColor = window.getComputedStyle(colorBox).backgroundColor.match(/\d+/g).map(Number);
            let targetRGB = targetColor.match(/\w\w/g).map(v => parseInt(v, 16));

            let startTime = null;

            let animateColor = (timestamp) => {
                if (!startTime) startTime = timestamp;
                let progress = Math.min((timestamp - startTime) / 70, 1);
                let currentRGB = startColor.map((start, i) => Math.round(start + (targetRGB[i] - start) * progress));
                colorBox.style.backgroundColor = `rgb(${currentRGB.join(', ')})`;
                if (progress < 1) requestAnimationFrame(animateColor);
            };

            requestAnimationFrame(animateColor);
        }
    });
}

function setData(code) {
    codeAA = code;

    items = code.split(",");
    
    for (i = 1; i <= items.length - 1; i++) {
        item = items[i];

        chooseOption(item);
    }
}

function printTable() {
    if (document.getElementById("title")) {
        document.getElementById("title").remove();
    }

    if (document.getElementById("smalltitle")) {
        document.getElementById("smalltitle").remove();
    }

    if (document.getElementById("backbutton")) {
        document.getElementById("backbutton").remove();
    }

    if (document.getElementById("navbar")) {
        document.getElementById("navbar").remove();
    }

    if (document.getElementById("addnewstudent2")) {
        document.getElementById("addnewstudent2").remove();
    }

    if (document.getElementById("brre")) {
        document.getElementById("brre").remove();
    }

    if (document.getElementById("printdate")) {
        document.getElementById("printdate").style.display = "block";
    }
    window.print();
}

function markSom() {
    items = codeAA.split(",");
    
    for (i = 1; i <= items.length - 1; i++) {
        item = items[i];

        let inputs = document.querySelectorAll('input[type="radio"]');

        inputs.forEach(input => {
            if (input.value === item) {
                let itemId = input.id;
                document.getElementById(itemId).parentElement.innerHTML = "⚫︎";
            }
        });    
    }
}

