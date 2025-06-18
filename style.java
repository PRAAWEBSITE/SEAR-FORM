<script>
  const canvas = document.getElementById("snow");
  const ctx = canvas.getContext("2d");
  let width = window.innerWidth;
  let height = window.innerHeight;
  canvas.width = width;
  canvas.height = height;

  const snowflakes = [];
  const numFlakes = 80;

  for (let i = 0; i < numFlakes; i++) {
    snowflakes.push({
      x: Math.random() * width,
      y: Math.random() * height,
      r: Math.random() * 3 + 1,
      d: Math.random() * 1 + 0.5
    });
  }

  function drawSnowflakes() {
    ctx.clearRect(0, 0, width, height);
    ctx.fillStyle = "white";
    ctx.beginPath();
    for (let i = 0; i < numFlakes; i++) {
      let f = snowflakes[i];
      ctx.moveTo(f.x, f.y);
      ctx.arc(f.x, f.y, f.r, 0, Math.PI * 2, true);
    }
    ctx.fill();
    moveSnowflakes();
  }

  let angle = 0;
  function moveSnowflakes() {
    angle += 0.003;
    for (let i = 0; i < numFlakes; i++) {
      let f = snowflakes[i];
      f.y += Math.pow(f.d, 2) + 0.5;
      f.x += Math.sin(angle) * 1;

      // Reset posisi
      if (f.y > height) {
        snowflakes[i] = {
          x: Math.random() * width,
          y: 0,
          r: f.r,
          d: f.d
        };
      }
    }
  }

  setInterval(drawSnowflakes, 33);

  // Resize responsif
  window.addEventListener("resize", () => {
    width = window.innerWidth;
    height = window.innerHeight;
    canvas.width = width;
    canvas.height = height;
  });

  // Style canvas agar tampil di background
  canvas.style.position = "fixed";
  canvas.style.top = 0;
  canvas.style.left = 0;
  canvas.style.pointerEvents = "none";
  canvas.style.zIndex = "0";
</script>
