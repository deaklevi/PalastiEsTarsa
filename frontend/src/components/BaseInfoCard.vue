<template>
    <div>
        <img :src="image" :alt="image">
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