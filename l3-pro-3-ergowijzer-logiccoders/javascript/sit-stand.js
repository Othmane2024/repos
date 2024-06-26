class ImageData {
    constructor(image, position, text) {
        this.image = image;
        this.position = position;
        this.text = text;
    }
}

let images = [];
images.push(new ImageData('../assets/ssd/low.webp', { x: 0, y: 0 }, "The desk goes down to 70cm"));
images.push(new ImageData('../assets/ssd/high.webp', { x: 0, y: 2 }, "The desk goes up to 120cm"));
images.push(new ImageData('../assets/ssd/mid.webp', { x: 0, y: 1 }, "The desk can be stopped at any height"));


let minX = images[0].position.x;
let maxX = images[0].position.x;
let minY = images[0].position.y;
let maxY = images[0].position.y;
images.forEach(item => {
    const { x, y } = item.position;
    minX = Math.min(minX, x);
    maxX = Math.max(maxX, x);
    minY = Math.min(minY, y);
    maxY = Math.max(maxY, y);
});

let currentPosition = { x: 0, y: 0 };

function failed(side) {
    console.log("Failed to move " + side);
    let button = document.querySelector(".ssd .image ." + side);
    button.classList.add("failed");
    setTimeout(() => {
        button.classList.remove("failed");
    }, 100);
}

function up() {
    let start = currentPosition.y;
    if (currentPosition.y == maxY) {
        currentPosition.y = minY;
    } else {
        currentPosition.y = currentPosition.y + 1;
    }
    let end = currentPosition.y;
    if (start == end) {
        failed("up");
    }
    update();
}
function down() {
    let start = currentPosition.y;
    if (currentPosition.y == minY) {
        currentPosition.y = maxY;
    } else {
        currentPosition.y = currentPosition.y - 1;
    }
    let end = currentPosition.y;
    if (start == end) {
        failed("down");
    }
    update();
}
function left() {
    let start = currentPosition.x;
    if (currentPosition.x == minX) {
        currentPosition.x = maxX;
    } else {
        currentPosition.x = currentPosition.x - 1;
    }
    let end = currentPosition.x;
    if (start == end) {
        failed("left");
    }
    update();
}
function right() {
    let start = currentPosition.x;
    if (currentPosition.x == maxX) {
        currentPosition.x = minX;
    } else {
        currentPosition.x = currentPosition.x + 1;
    }
    let end = currentPosition.x;
    if (start == end) {
        failed("right");
    }
    update();
}
function getCurrentImage() {
    let currentImage = images.find(image => {
        return image.position.x === currentPosition.x && image.position.y === currentPosition.y;
    });
    return currentImage;
}

function update() {
    images.sort((a, b) => {
        // Compare x values first
        if (a.position.x !== b.position.x) {
            return a.position.x - b.position.x;
        }
        // If x values are equal, compare y values
        return a.position.y - b.position.y;
    });
    document.querySelector('.ssd .image-container img').src = getCurrentImage().image;
    document.querySelector(".ssd .image #subtext").innerHTML = getCurrentImage().text + " (" + Number(currentPosition.y + 1) + ")";
}
update();