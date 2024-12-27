<div class="flex justify-center items-center dark:text-[#FFF481] bg-transparent">
    <div class="bg-transparent   rounded-lg  text-center">
        <div class="lg:text-3xl font-semibold text-xl " id="clock">00:00:00</div>
    </div>
</div>

<script>
    function updateClock() {
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const timeString = now.toLocaleTimeString();
        const dateString = now.toLocaleDateString(undefined, options);
        
        document.getElementById('clock').textContent = timeString;
        document.getElementById('date').textContent = dateString;
    }

    setInterval(updateClock, 1000);
    updateClock(); // Initialize the clock immediately
</script>
