<template>
    <div class="club-achiever">
        <div class="container">
            <div class="club-achievers-inner">
                <background :source="backgroundVideo"></background>
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="club-text">
                            <h1 class="main-title text-end diamond-title">{{ headingTitle }}</h1>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="years-of-glore text-center">
                            <img :src="diamondImage" loading="lazy" alt="" class="years-image" />
                            <img :src="flagImage" loading="lazy" alt="" class="stage-image" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="awared-employee-block">
                            <div class="row">
                                <div v-for="(employee, index) in employees" :key="index" class="col-md-6 col-6">
                                    <employee :employee="employee"></employee>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Employee from "./Employee.vue";
import Background from "./Background.vue";
export default {
    components: {Background, Employee},
    props: {
        employees: Array,
        headingTitle: String,
        diamondImage: String,
        flagImage: String,
        backgroundVideo: String
    }
}
</script>
