<div x-data="darkModeComponent()" x-init="updateHtmlClass()">
    <button @click="toggleDarkMode()">
        <i data-feather="moon" x-show="!darkMode" class="size-5 mt-1 md:size-6"></i>
        <i data-feather="sun" x-show="darkMode" class="size-5 mt-1 md:size-6"></i>
    </button>
</div>

<script>
    function darkModeComponent() {
        return {
            darkMode: localStorage.getItem('darkMode') === 'true',
            toggleDarkMode() {
                this.darkMode = !this.darkMode;
                localStorage.setItem('darkMode', this.darkMode);
                this.updateHtmlClass();
                feather.replace(); // Agar ikon berubah
            },
            updateHtmlClass() {
                // console.log('Dark Mode:', this.darkMode);
                if (this.darkMode) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            }
        }
    }
</script>
