<template>
    <MusicLayout>
        <template #title>
            Créer une Musiques
        </template>

        <template #action> 
            <Link :href="route('tracks.index')">
                Retour au menu </Link>
        </template>
        <template #content>

        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'
import { Link } from '@inertiajs/vue3';
export default {
    components: {
        MusicLayout,
        Link
    },
}
</script>