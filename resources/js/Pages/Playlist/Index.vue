<template>
    <MusicLayout>
        <template #title>
            <div>
                Playlist
            </div>
        </template>

        <template #action>
            <Link 
            :href="route('playlists.create')"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4"
            >
            Créer une playlist
            </Link>
        </template>
        <template #content>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Nombre de musiques</th>
                        <th>Crée le</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody
                    v-for="(playlist, i) in playlists"
                    :key="playlist.uuid"
                >
                    <td>{{ i + 1 }} </td>
                    <td>{{ playlist.title }} </td>
                    <td>{{ playlist.tracks_count }} </td>
                    <td>{{ playlist.created_at }} </td>
                    <td>
                        <Link
                        :href="route('playlists.show', {playlist: playlist})"
                        class="bg-blue-500 hover:bg-nlue-800 text-white font-bold py-2 px-4">
                        Show
                        </Link>
                    </td>
                </tbody>
            </table>
        </template>

    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'

export default {
    components: {
        MusicLayout,
    },
    props: {
        playlists : Array
    },
    data() {
        return {
            'search': '',
            'audio': null,
            'currentTrack': null
        }
    },
    computed: {
        filteredTracks() {
            return this.tracks.filter(track => track.title.toLowerCase().includes(this.search.toLowerCase()) || track.artist.toLowerCase().includes(this.search.toLowerCase()));
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