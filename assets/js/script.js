const textElement = document.querySelector('section');
const text = textElement.textContent.trim();
textElement.innerHTML = "";

let i = 0;
const type = () => {
  if (i < text.length) {
    textElement.innerHTML += text.charAt(i);
    i++;
    setTimeout(type, 100);
  }
};
type();

function showForm(formId) {
  const login = document.getElementById('login-form');
  const register = document.getElementById('register-form');

  if (formId === 'login-form') {
    login.style.display = 'block';
    register.style.display = 'none';
  } else {
    login.style.display = 'none';
    register.style.display = 'block';
  }
}

