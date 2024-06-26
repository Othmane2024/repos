const canvas = document.getElementById("myCanvas");
const ctx = canvas.getContext("2d");

const playButton = document.getElementById("playButton");
const gameCanvas = document.getElementById("myCanvas");
const restartButton = document.getElementById("restartButton");

let playerXScore = parseInt(getCookie("playerXScore")) || 0;
let playerOScore = parseInt(getCookie("playerOScore")) || 0;

let currentPlayer = "X";
const board = ["", "", "", "", "", "", "", "", ""];
let gameActive = false;
// Functie om de titel van het spel op het canvas te tekenen
function drawTitle() {
   // de stijl, grootte en kleur van het lettertype in
  ctx.fillStyle = "black";
  ctx.font = "35px Impact, Charcoal, sans-serif, cursive";
  ctx.textAlign = "center";
  ctx.fillText("Tic Tac toe", canvas.width / 2, 70);
}
drawTitle();

// Functie om een tekst op het canvas te tekenen
function drawExistingText() {
  ctx.fillStyle = "black";
  ctx.font = "24px Arial";
  ctx.fillText("Welcome to the Game!", 220, 150);
}
drawExistingText();
// Functie om nieuwe tekst aan het canvas toe te voegen
function addNewText() {
  ctx.fillStyle = "blue";
  ctx.font = "20px Arial";
  ctx.fillText("Enjoy ", 230, 190);
}
addNewText();
// Functie om het spel te starten
function startGame() {
  // Kiezen willekeurig de startende speler
   currentPlayer = Math.random() < 0.5 ? "X" : "O";
  ctx.fillStyle = "rgb(243, 237, 237)";
  ctx.fillRect(0, 0, gameCanvas.width, gameCanvas.height);
  drawBoard();
  drawScoreboard();
  drawTurn();
  gameActive = true;
  playButton.style.display = "none";
  restartButton.style.display = "block";
  exitButton.draw();
}
// Functie om het Tic Tac Toe-bord op het canvas te tekenen
function drawBoard() {
  ctx.strokeStyle = "black";
  ctx.lineWidth = 2;
// de afmetingen van het bord en de startpositie
  const canvasCenterX = canvas.width / 2;
  const canvasCenterY = canvas.height / 2;
  const boardWidth = 300;
  const boardHeight = 300;

  const boardStartX = canvasCenterX - boardWidth / 2;
  const boardStartY = canvasCenterY - boardHeight / 2;

  // Horizontale lijnen tekenen
  ctx.beginPath();
  ctx.moveTo(boardStartX, boardStartY + 100);
  ctx.lineTo(boardStartX + boardWidth, boardStartY + 100);
  ctx.stroke();

  ctx.beginPath();
  ctx.moveTo(boardStartX, boardStartY + 200);
  ctx.lineTo(boardStartX + boardWidth, boardStartY + 200);
  ctx.stroke();

 // Verticale lijnen tekenen
  ctx.beginPath();
  ctx.moveTo(boardStartX + 100, boardStartY);
  ctx.lineTo(boardStartX + 100, boardStartY + boardHeight);
  ctx.stroke();

  ctx.beginPath();
  ctx.moveTo(boardStartX + 200, boardStartY);
  ctx.lineTo(boardStartX + 200, boardStartY + boardHeight);
  ctx.stroke();
}
// Functie om een marker (X of O) op de opgegeven cel te tekenen
function drawMarker(cellIndex) {
  if (currentPlayer === "X") {
    ctx.fillStyle = "blueviolet";
  } else {
    ctx.fillStyle = "black";
  }
  ctx.font = "70px Arial";
  ctx.textAlign = "center";
  ctx.fillText(
    currentPlayer,
    getCellX(cellIndex) + 50,
    getCellY(cellIndex) + 80
  );
}
// Functie om een marker op het bord te plaatsen en een winnaar te controleren
function placeMarker(cellIndex) {
  if (!gameActive || board[cellIndex] !== "") return;

  board[cellIndex] = currentPlayer;
  drawMarker(cellIndex);
  checkWinner();
  togglePlayer();
  drawTurn(); 

}
// Functie om tussen de huidige speler X en O te wisselen
function togglePlayer() {
  currentPlayer = currentPlayer === "X" ? "O" : "X";
}
// Functie om te controleren of er een winnaar is of een gelijkspel
function checkWinner() {
  const winningCombinations = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6],
  ];

  for (let i = 0; i < winningCombinations.length; i++) {
    const [a, b, c] = winningCombinations[i];
    if (board[a] && board[a] === board[b] && board[a] === board[c]) {
      setTimeout(() => {
        alert(`${board[a]} wins!`);
        updateScores(board[a]);
        drawScoreboard();
        restartGame();
      }, 500);
      return;
    }
  }

  if (!board.includes("")) {
    setTimeout(() => {
      alert("It's a draw!");
      restartGame();
    }, 500);
  }
}
// Functie om de X-coördinaat van de opgegeven cel te krijgen
function getCellX(cellIndex) {
  const canvasCenterX = gameCanvas.width / 2;
  const boardStartX = canvasCenterX - 150;
  return boardStartX + (cellIndex % 3) * 100;
}
// Functie om de Y-coördinaat van de opgegeven cel te krijgen
function getCellY(cellIndex) {
  const canvasCenterY = gameCanvas.height / 2;
  const boardStartY = canvasCenterY - 150;
  return boardStartY + Math.floor(cellIndex / 3) * 100;
}
// Functie om het spel te herstarten
function restartGame() {
  currentPlayer = "X";
  board.fill("");
  gameActive = true;
  ctx.clearRect(0, 0, gameCanvas.width, gameCanvas.height);
  drawScoreboard();
  startGame();
}

function drawScoreboard() {
  ctx.fillStyle = "rgb(243, 237, 237)";
  ctx.fillRect(0, 0, gameCanvas.width, gameCanvas.height);
  drawBoard();
  ctx.fillStyle = "black";
  ctx.font = "24px Arial";
  ctx.textAlign = "center";
  ctx.fillText(`Player X: ${playerXScore}`, canvas.width / 2 - 80, 50);
  ctx.fillText(`Player O: ${playerOScore}`, canvas.width / 2 + 80, 50);
}

function drawTurn() {
  ctx.fillStyle = "rgb(243, 237, 237)";
  ctx.fillRect(canvas.width / 2 - 50, 60, 100, 30); // Wis het gebied waar de afslag wordt weergegeven 
  ctx.fillStyle = "black";
  ctx.font = "20px Arial";
  ctx.textAlign = "center";
  if (currentPlayer === "X") {
    ctx.fillText("Turn: X", canvas.width / 2, 90);
  } else {
    ctx.fillText("Turn: O", canvas.width / 2, 90);
  }
}
// Functie om scores bij te werken en op te slaan in cookies
function updateScores(winner) {
  if (winner === "X") {
    playerXScore++;
  } else if (winner === "O") {
    playerOScore++;
  }

  setCookie("playerXScore", playerXScore);
  setCookie("playerOScore", playerOScore);
}
// Functie om een cookie in te stellen met de gegeven naam en waarde
function setCookie(name, value) {
  document.cookie = `${name}=${value}`;
}
// Functie om de waarde van een cookie op te halen op basis van de naam
function getCookie(name) {
  const cookieValue = document.cookie
    .split("; ")
    .find((row) => row.startsWith(`${name}=`))
    ?.split("=")[1];
  return cookieValue;
}
// Object voor de exitknop
const exitButton = {
  x: canvas.width - 50,
  y: 10,
  width: 40,
  height: 40,
  color: "red",
  draw: function () {
    ctx.fillStyle = this.color;
    ctx.fillRect(this.x, this.y, this.width, this.height);

    ctx.fillStyle = "white";
    ctx.font = "20px Arial";
    ctx.textAlign = "center";
    ctx.fillText("X", this.x + this.width / 2, this.y + this.height / 2 + 6);
  },
};
// Event listener voor muisklik op het canvas
gameCanvas.addEventListener("click", function (event) {
  const mouseX = event.clientX - gameCanvas.getBoundingClientRect().left;
  const mouseY = event.clientY - gameCanvas.getBoundingClientRect().top;
// Controleer of de exitknop is geklikt
  if (
    gameActive &&
    mouseX >= exitButton.x &&
    mouseX <= exitButton.x + exitButton.width &&
    mouseY >= exitButton.y &&
    mouseY <= exitButton.y + exitButton.height
  ) {
    gameActive = false;
    playButton.style.display = "block";
    restartButton.style.display = "none";
    ctx.clearRect(0, 0, gameCanvas.width, gameCanvas.height);
    drawTitle();
    drawExistingText();
    addNewText();
  } else {
    const column = Math.floor((mouseX - getCellX(0)) / 100);
    const row = Math.floor((mouseY - getCellY(0)) / 100);

    if (column >= 0 && column < 3 && row >= 0 && row < 3) {
      const cellIndex = row * 3 + column;
      placeMarker(cellIndex);
    }
  }
});
playButton.addEventListener("click", startGame);
restartButton.addEventListener("click", restartGame);