    // 3D tilt effect
    const container = document.getElementById('mainContainer');
    document.addEventListener('mousemove', (e) => {
      const x = (window.innerWidth / 2 - e.pageX) / 40;
      const y = (window.innerHeight / 2 - e.pageY) / 40;
      container.style.transform = `rotateY(${x}deg) rotateX(${y}deg)`;
    });

    // Mouse-follow effect
    const cursorDot = document.getElementById('cursorDot');
    const cursorOutline = document.getElementById('cursorOutline');

    document.addEventListener('mousemove', (e) => {
      cursorDot.style.top = `${e.clientY}px`;
      cursorDot.style.left = `${e.clientX}px`;
      cursorOutline.style.top = `${e.clientY - 20}px`;
      cursorOutline.style.left = `${e.clientX - 20}px`;
    });