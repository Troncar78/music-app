<template>
    <div class="bg-white p-8 rounded-lg shadow-md w-80"
    :class="{ 'border-blue-500 border-2 border-solid': active }">
<!-- Album Cover -->
<img :src="`/storage/${track.image}`" alt="aaa">
<!-- Song Title -->
<h2 class="text-xl font-semibold text-center">{{ track.title }}</h2>
<!-- Artist Name -->
<p class="text-gray-600 text-sm text-center">{{ track.title }}</p>
<!-- Music Controls -->
<div class="mt-6 flex justify-center items-center">
    <Link :href="route('tracks.edit', { track: track })">
        <button class="p-3 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> 
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/> 
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/> 
            </svg>
        </button>
    </Link>
    <button @click="handleClick"  class="p-4 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none mx-4" >
        <svg width="64px" height="64px" viewBox="0 0 24 24" class="w-6 h-6 text-gray-600" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <path d="M2 6C2 4.11438 2 3.17157 2.58579 2.58579C3.17157 2 4.11438 2 6 2C7.88562 2 8.82843 2 9.41421 2.58579C10 3.17157 10 4.11438 10 6V18C10 19.8856 10 20.8284 9.41421 21.4142C8.82843 22 7.88562 22 6 22C4.11438 22 3.17157 22 2.58579 21.4142C2 20.8284 2 19.8856 2 18V6Z" fill="#000000"></path>
            <path d="M14 6C14 4.11438 14 3.17157 14.5858 2.58579C15.1716 2 16.1144 2 18 2C19.8856 2 20.8284 2 21.4142 2.58579C22 3.17157 22 4.11438 22 6V18C22 19.8856 22 20.8284 21.4142 21.4142C20.8284 22 19.8856 22 18 22C16.1144 22 15.1716 22 14.5858 21.4142C14 20.8284 14 19.8856 14 18V6Z" fill="#000000"></path>
        </g>
        </svg>
    </button>
    <Link :href="route('tracks.destroy', { track: track })" method="delete">
        <button class="p-3 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"> 
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/> 
            </svg>
        </button>
    </Link>
</div>
</div>
</template>

<script>
export default {
    emits: ['played'],
    props: {
        track: Object,
        currentTrack: String,
        active: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        handleClick() {
            this.$emit('played', this.track)
        }
    }
}
</script>