<template>
    <div>
        <img :src="image" alt="">
        <p>
            {{ text }}
        </p>
    </div>
</template>

<script>
export default {
    props: {
        image: String,
        text: String
    }
}
</script>