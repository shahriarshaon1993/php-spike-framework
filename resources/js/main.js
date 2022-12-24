import generateJock from "./generateJock";

// Import our custom CSS
import '../scss/styles.scss'

// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap'

const jokeBtn = document.getElementById('jokeBtn');
jokeBtn.addEventListener('click', generateJock);

generateJock();