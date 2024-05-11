<template>
    <div class="bg-video-animation">
        <video width="100%" height="100%" loop autoplay muted>
            <source :src="source" type="video/mp4" />
        </video>
    </div>
</template>

<script>
export default {
    props:{
        source: String
    }
}
</script>
