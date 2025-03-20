<div class="relative w-full overflow-hidden shadow-md rounded-md dark:shadow-slate-600">
    <!-- Wrapper untuk Slide -->
    <div id="slider" class="flex transition-transform duration-700 ease-in-out">
        <!-- Duplicate Slide 1 di Akhir untuk Efek Halus -->
        <div class="w-full flex-shrink-0">
            <img src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?q=80&w=3540&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="w-full h-56 md:h-[350px] object-cover" alt="">
        </div>
        <!-- Slide 2 -->
        <div class="w-full flex-shrink-0">
            <img src="https://images.unsplash.com/photo-1544716278-e513176f20b5?q=80&w=3474&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="w-full h-56 md:h-[350px] object-cover" alt="">
        </div>
        <!-- Slide 3 -->
        <div class="w-full flex-shrink-0">
            <img src="https://images.unsplash.com/photo-1509021436665-8f07dbf5bf1d?q=80&w=3474&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="w-full h-56 md:h-[350px] object-cover" alt="">
        </div>
        <!-- Slide 4 -->
        <div class="w-full flex-shrink-0">
            <img src="https://images.unsplash.com/photo-1577627444534-b38e16c9d796?q=80&w=2813&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="w-full h-56 md:h-[350px] object-cover" alt="">
        </div>
        <!-- Duplicate Slide 1 untuk Transisi Halus -->
        <div class="w-full flex-shrink-0">
            <img src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?q=80&w=3540&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="w-full h-56 md:h-[350px] object-cover" alt="">
        </div>
    </div>
</div>

<script>
    let index = 0;
    const totalSlides = 4; // Hanya 4 gambar asli
    const slider = document.getElementById("slider");

    function nextSlide() {
        index++;
        slider.style.transition = "transform 0.7s ease-in-out";
        slider.style.transform = `translateX(-${index * 100}%)`;

        // Jika sudah sampai slide duplikat pertama (slide ke-5), reset ke awal tanpa efek transisi
        if (index === totalSlides) {
            setTimeout(() => {
                slider.style.transition = "none";
                index = 0;
                slider.style.transform = `translateX(0)`;
            }, 700);
        }
    }

    setInterval(nextSlide, 4000);
</script>
