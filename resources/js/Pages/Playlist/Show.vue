<template>
    <MusicLayout>
        <template #title>
            <div>
                Ma Playlist
            </div>
        </template>

        <template #action>
            <Link 
            v-if="$page.props.isAdmin"
            :href="route('playlists.index')"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">
            Retour
            </Link>
        </template>
        <template #content>
            <ul class="list-none grid grid-cols-1 md:grid-cols-4 gap-4 p-4">
                <TrackCard 
                    v-for="track in playlist.tracks" 
                    :key="track.uuid"
                    :track="track" 
                    :active="currentTrack === track.uuid"
                    @played="play"
                />
            </ul>
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'
import TrackCard from '@/Components/Track/TrackCard.vue'

export default {
    components: {
        MusicLayout,
    },
    props: {
        playlist: Object
    },
    data() {
        return {
            'search': '',
            'audio': null,
            'currentTrack': null
        }
    },
    methods: {
        play(track) {
            const url = '/storage/' + track.music;

            if (!this.currentTrack) {
                this.audio = new Audio(url);
                this.audio.play();
            } else if (this.currentTrack !== track.uuid) {
                this.audio.pause();
                this.audio.src = url;
                this.audio.play();
            } else if (!this.audio.paused) {
                this.audio.pause();
            } else {
                this.audio.play();
            }

            this.currentTrack = track.uuid;
            this.audio.addEventListener('ended', () => this.currentTrack = null)
        }
    }
}

</script>

<script setup>
import TrackCard from '@/Components/Track/TrackCard.vue'
</script>