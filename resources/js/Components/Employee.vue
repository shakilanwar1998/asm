<template>
    <div class="employee-one emplyee-name">
        <div class="employee-image">
            <img :src="'/storage/'+employee.photo" loading="lazy" alt=""/>
        </div>
        <div class="ribbon">{{ employee.name }}</div>
    </div>
</template>

<script>
export default {
    props: {
        employee: Object
    }
}
</script>
