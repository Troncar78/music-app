<template>
    <MusicLayout>
        <template #title>
            <div>
                Clé API
            </div>
        </template>

        <template #action>
            <Link 
            :href="route('apikeys.create')"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4"
            >
            Créer une clé API
            </Link>
        </template>
        <template #content>
            <div class="flex items-center justify-center">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white shadow-md rounded-xl">
                        <thead>
                            <tr class="bg-blue-gray-100 text-gray-700">
                            <th class="py-3 px-4 text-left">#</th>
                            <th class="py-3 px-4 text-left">Nom</th>
                            <th class="py-3 px-4 text-left">Clé</th>
                            <th class="py-3 px-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-blue-gray-900"
                        v-for="(apikey, i) in apikeys"
                        :key="apikey.uuid">
                            <tr class="border-b border-blue-gray-200 hover:bg-slate-50">
                            <td class="py-3 px-4">{{ i + 1 }}</td>
                            <td class="py-3 px-4">{{ apikey.name }}</td>
                            <td class="py-3 px-4">{{ apikey.key }}</td>
                            <td class="py-3 px-4">
                                <Link
                            :href="route('apikeys.destroy', {apikey: apikey})" method="delete"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            as="button">
                            Supprimer
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
        apikeys : Array
    },
}
</script>

<script setup>
import TrackCard from '@/Components/Track/TrackCard.vue'
</script>