function surprise() {
    const tips = [
        "Did you know? The best-selling video game of all time is Minecraft.",
        "Pro tip: Take regular breaks when gaming for better focus.",
        "Easter Egg: On this site, every page has a unique animated button.",
        "Remember! Save your progress often.",
        "Fun fact: The first video game ever created was 'Tennis for Two' in 1958.",
        "Did you know? The voice of Mario, Charles Martinet, has recorded over 50,000 lines.",
        "Trivia: Pac-Man was inspired by a pizza with a slice missing.",
        "Pro tip: Use headphones to immerse yourself fully in the game world.",
        "Did you know? Speedrunning communities race to complete games as fast as possible.",
        "Easter Egg: Some games hide secret levels that only a few players have discovered.",
        "Fun fact: The character Lara Croft was inspired by a real archaeologist.",
        "Did you know? The PlayStation was originally a joint project with Nintendo.",
        "Trivia: The Konami Code (↑ ↑ ↓ ↓ ← → ← → B A) unlocks cheats in many games.",
        "Pro tip: Customize your controls for better gameplay comfort.",
        "Did you know? The first Easter egg in a video game appeared in 'Adventure' for Atari.",
        "Fun fact: In 'The Sims,' characters can have imaginary friends that affect gameplay.",
        "Trivia: The famous 'Game Over' screen was first used in 1978's 'Space Invaders.'",
        "Did you know? The voice actor for Pikachu is Ikue Otani.",
        "Pro tip: Learning game lore can improve your experience and strategy.",
        "Easter Egg: Some games have secret messages from developers hidden in code."
    ];
    document.getElementById('tip').textContent = tips[Math.floor(Math.random() * tips.length)];
}