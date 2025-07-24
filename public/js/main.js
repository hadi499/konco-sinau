document.addEventListener('DOMContentLoaded', function () {
  console.log('main/easy');

  const modalBtns = [...document.getElementsByClassName('modal-button')];
  const modalTitle = document.getElementById('modal-title-confirm');
  const modalBody = document.getElementById('modal-body-confirm');
  const startButton = document.getElementById('start-button');
  const modal = document.getElementById('quizStartModal');
  const closeButtons = document.querySelectorAll('[data-modal-hide="quizStartModal"]');

  const url = window.location.href;

  modalBtns.forEach(modalBtn => {
    modalBtn.addEventListener('click', () => {
      const id = modalBtn.getAttribute('data-id');
      const name = modalBtn.getAttribute('data-quiz');
      const numQuestions = modalBtn.getAttribute('data-questions');
      const scoreToPass = modalBtn.getAttribute('data-pass');
      const time = modalBtn.getAttribute('data-time');

      console.log('Quiz Data:', { id, name, numQuestions, scoreToPass, time });

      if (name && numQuestions && scoreToPass && time) {
        modalTitle.textContent = name;
        modalBody.innerHTML = `
          <ul class="list-disc pl-5 space-y-1">
            <li>Number of questions: <b>${numQuestions}</b></li>
            <li>Score to pass: <b>${scoreToPass}</b></li>
            <li>Time: <b>${time}</b></li>
          </ul>
        `;
      }

      // Tampilkan modal
      modal.classList.remove('hidden');

      // Update onclick agar tidak dobel listener
      startButton.onclick = () => {
        window.location.href = `${url}/${id}`;
      };
    });
  });

  // Tutup modal saat klik tombol close
  closeButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      modal.classList.add('hidden');
    });
  });

  // Tutup modal jika klik di luar modal
  modal.addEventListener('click', (e) => {
    if (e.target === modal) {
      modal.classList.add('hidden');
    }
  });
});
