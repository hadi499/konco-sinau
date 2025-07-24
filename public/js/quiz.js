document.addEventListener('DOMContentLoaded', function () {
  console.log('quiz');

  const quizBox = document.getElementById('quiz-box');
  const scoreBox = document.getElementById('score-box');
  const resultBox = document.getElementById('result-box');
  const timerBox = document.getElementById('timer-box');
  const wrapTimer = document.getElementById('wrap-timer');
  const startLagi = document.getElementById('start-lagi');
  const url = window.location.href;
  const quizForm = document.getElementById('quiz-form');

  console.log(url);

  // ✅ Aktivasi Timer (Bootstrap → Tailwind)
  const activateTimer = (timeInSeconds) => {
    let seconds = timeInSeconds;

    const updateDisplay = () => {
      let displaySeconds = seconds < 10 ? '0' + seconds : seconds;
      timerBox.innerHTML = `<b class="text-blue-600">${displaySeconds}</b>`;
    };

    updateDisplay();

    const timer = setInterval(() => {
      seconds--;

      if (seconds < 0) {
        clearInterval(timer);
        wrapTimer.classList.add('border-red-500');
        timerBox.innerHTML = `<b class="text-red-600 rounded">00</b>`;
        sendData();
      } else {
        updateDisplay();
      }
    }, 1000);

    quizForm.addEventListener('submit', () => {
      clearInterval(timer);
      console.log('Timer dihentikan karena submit');
    });
  };

  // ✅ Ambil pertanyaan dan jawaban (Bootstrap → Tailwind)
  $.ajax({
    type: 'GET',
    url: `${url}/data`,
    success: function (response) {
      const data = response.data;

      data.forEach(el => {
        for (const [question, answers] of Object.entries(el)) {
          let questionDiv = `
            <div class="mb-4 border rounded p-3 w-40">
              <div class="text-center mb-2 bg-blue-100 py-2 font-semibold text-gray-800">
                <b>${question}</b>
              </div>
              <div>
          `;

          answers.forEach(answer => {
            questionDiv += `
              <div class="px-2 mb-2 flex items-center gap-2">
                <input type="radio" class="ans" id="${question}-${answer}" name="${question}" value="${answer}">
                <label for="${question}-${answer}" class="text-gray-700">${answer}</label>
              </div>
            `;
          });

          questionDiv += '</div></div>';
          quizBox.innerHTML += questionDiv;
        }
      });

      activateTimer(response.time);
    },
    error: function (error) {
      console.log(error);
    }
  });

  // ✅ Kirim data jawaban ke server (Bootstrap → Tailwind)
  const sendData = () => {
    const elements = [...document.getElementsByClassName('ans')];
    const data = {
      '_token': $('meta[name="csrf-token"]').attr('content')
    };

    elements.forEach(el => {
      if (el.checked) {
        data[el.name] = el.value;
        console.log(`Jawaban dipilih: ${el.value} untuk ${el.name}`);
      } else {
        if (!data[el.name]) {
          data[el.name] = null;
        }
      }
    });

    $.ajax({
      type: 'POST',
      url: `${url}/save`,
      data: data,

      success: function (response) {
        console.log(data);
        quizForm.classList.add('hidden'); // ✅ ganti not-visible → hidden (Tailwind)

        const lulus = `<div class="text-blue-600 font-semibold">😁 Lulus, score: ${response.score}</div>`;
        const gagal = `<div class="text-red-600 font-semibold">🥵 Gagal, score: ${response.score}</div>`;
        scoreBox.innerHTML = response.passed ? lulus : gagal;

        startLagi.innerHTML = `<a href="${url}" class="border border-blue-600 text-blue-600 px-4 py-2 rounded hover:bg-blue-50">Start game lagi</a>`;

        response.results.forEach(res => {
          const resDiv = document.createElement('div');
          for (const [question, resp] of Object.entries(res)) {
            let questionObj = JSON.parse(question);
            console.log('Title:', questionObj.title);

            resDiv.innerHTML += questionObj.title;
            resDiv.classList.add('p-3', 'text-white', 'text-sm', 'mt-4', 'rounded', 'w-72');

            if (resp === 'not answered') {
              resDiv.innerHTML += ', Tidak dijawab';
              resDiv.classList.add('bg-red-500');
            } else {
              const answer = resp['answered'];
              const correct = resp['correct_answer'];

              if (answer === correct) {
                resDiv.classList.add('bg-green-500');
                resDiv.innerHTML += ` | dijawab: ${answer}`;
              } else {
                resDiv.classList.add('bg-red-500');
                resDiv.innerHTML += ` | dijawab: ${answer}`;
              }
            }
          }
          resultBox.append(resDiv);
        });
      },
      error: function (error) {
        console.log(error);
      }
    });
  };

  quizForm.addEventListener('submit', function (e) {
    e.preventDefault();
    sendData();
  });
});
