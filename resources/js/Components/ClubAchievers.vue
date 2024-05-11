<template>

    <achievers
        :headingTitle="diamondTitle"
        :employees="fifteenMillions"
        :diamondImage="diamondLogo"
        :flagImage="flagImage"
        :backgroundVideo="diamondBackground"
    ></achievers>

    <achievers
        :headingTitle="goldTitle"
        :employees="tenMillions"
        :diamondImage="goldLogo"
        :flagImage="flagImage"
        :backgroundVideo="goldBackground"
    ></achievers>

</template>


<script>
import Employee from "./Employee.vue";
import Background from "./Background.vue";
import Achievers from "./Achievers.vue";

export default {
    components: {Achievers, Background, Employee},
    data() {
        return {
            goldTitle: "",
            diamondTitle: "",
            goldBackground: '/img/Corporate-one-compress.mp4',
            diamondBackground: '/img/Corporate-two-compress.mp4',
            goldLogo: '',
            diamondLogo: '',
            flagImage: '/img/flag.png',
            tenMillions: [],
            fifteenMillions: []
        };
    },
    created() {
        fetch('data')
            .then(response => response.json())
            .then(data => {
                this.goldTitle = data.goldTitle;
                this.diamondTitle = data.diamondTitle;
                this.tenMillions = data.tenMillions;
                this.fifteenMillions = data.fifteenMillions;
                this.goldLogo = data.goldLogo;
                this.diamondLogo = data.diamondLogo;
                this.startConfettiAnimation();
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    },
    methods: {
        startConfettiAnimation() {
            const duration = 15 * 1000,
                animationEnd = Date.now() + duration,
                defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 99 };

            function randomInRange(min, max) {
                return Math.random() * (max - min) + min;
            }

            const interval = setInterval(function() {
                const timeLeft = animationEnd - Date.now();

                if (timeLeft <= 0) {
                    return clearInterval(interval);
                }

                const particleCount = 50 * (timeLeft / duration);

                // since particles fall down, start a bit higher than random
                confetti(
                    Object.assign({}, defaults, {
                        particleCount,
                        origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 },
                    })
                );
                confetti(
                    Object.assign({}, defaults, {
                        particleCount,
                        origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 },
                    })
                );
            }, 250);
        }
    }
};


</script>
