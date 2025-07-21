document.getElementById('jobForm').addEventListener('submit', function (e) {
  e.preventDefault();
  const title = document.getElementById('title').value;
  const company = document.getElementById('company').value;
  const description = document.getElementById('description').value;
  fetch('php/post_job.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ title, company, description })
  })
    .then(res => res.json())
    .then(data => {
      alert(data.message);
      loadJobs();
    });
});
function loadJobs() {
  fetch('php/get_jobs.php')
    .then(res => res.json())
    .then(jobs => {
      const list = document.getElementById('jobList');
      list.innerHTML = '';
      jobs.forEach(job => {
        const div = document.createElement('div');
        div.className = 'job';
        div.innerHTML = `<h3>${job.title}</h3><p>${job.company}</p><p>${job.description}</p>`;
        list.appendChild(div);
      });
    });
}
window.onload = loadJobs;