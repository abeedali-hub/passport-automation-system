function updateClock() {
    const now = new Date();
    let hours = now.getHours();
    let minutes = now.getMinutes();
    let seconds = now.getSeconds();
    
    // Format time (HH:MM:SS)
    hours = hours < 10 ? "0" + hours : hours;
    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;

    const formattedTime = `Live Time: ${hours}:${minutes}:${seconds}`;
    document.getElementById("live-clock").innerText = formattedTime;
}

// Update clock every second
setInterval(updateClock, 1000);
updateClock(); // Initial call to show clock immediately
