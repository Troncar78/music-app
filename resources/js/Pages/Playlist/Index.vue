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
            <div class="flex items-center justify-center">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white shadow-md rounded-xl">
                    <thead>
                        <tr class="bg-blue-gray-100 text-gray-700">
                        <th class="py-3 px-4 text-left">#</th>
                        <th class="py-3 px-4 text-left">Titre</th>
                        <th class="py-3 px-4 text-left">Nombre de musiques</th>
                        <th class="py-3 px-4 text-left">Crée le</th>
                        <th class="py-3 px-4 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-blue-gray-900"
                    v-for="(playlist, i) in playlists"
                    :key="playlist.uuid">
                        <tr class="border-b border-blue-gray-200 hover:bg-slate-50">
                        <td class="py-3 px-4">{{ i + 1 }}</td>
                        <td class="py-3 px-4">{{ playlist.title }}</td>
                        <td class="py-3 px-4">{{ playlist.tracks_count }}</td>
                        <td class="py-3 px-4">{{ playlist.created_at }}</td>
                        <td class="py-3 px-4">
                            <Link
                        :href="route('playlists.show', {playlist: playlist})"
                        class="bg-slate-500 hover:bg-slate-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ">
                        Show
                        </Link>
                        </td>
                        </tr>
                    </tbody>
                    </table>
                    <div class="w-full pt-5 px-4 mb-8 mx-auto ">
                    <div class="text-sm text-gray-700 py-1 text-center">
                    </div>
                    </div>
                </div>
                </div>
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