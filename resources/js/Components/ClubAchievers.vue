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
                this.goldBackground = data.goldBackground;
                this.diamondBackground = data.diamondBackground;
                this.tenMillions = data.tenMillions;
                this.fifteenMillions = data.fifteenMillions;
                this.goldLogo = data.goldLogo;
                this.diamondLogo = data.diamondLogo;
                this.triggerConfetti();
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    },
    methods: {
        triggerConfetti() {
            const defaults = {
                spread: 360,
                ticks: 50,
                gravity: 0,
                decay: 0.94,
                startVelocity: 30,
                shapes: ["star"],
                colors: ["FFE400", "FFBD00", "E89400", "FFCA6C", "FDFFB8"],
            };

            function shoot() {
                confetti({
                    ...defaults,
                    particleCount: 40,
                    scalar: 1.2,
                    shapes: ["star"],
                });

                confetti({
                    ...defaults,
                    particleCount: 10,
                    scalar: 0.75,
                    shapes: ["circle"],
                });
            }

            setTimeout(shoot, 0);
            setTimeout(shoot, 100);
            setTimeout(shoot, 200);
        }
    }
};

</script>
