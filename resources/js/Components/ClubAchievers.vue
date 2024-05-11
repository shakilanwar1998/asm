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
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }
};


</script>
