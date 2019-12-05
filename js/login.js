const logUpButton = document.getElementById('logUp');
const logInButton = document.getElementById('logIn');
const container = document.getElementById('container');

logUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

logInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});