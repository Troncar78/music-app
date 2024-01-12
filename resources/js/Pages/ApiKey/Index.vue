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
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Clé</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody
                    v-for="(apikey, i) in apikeys"
                    :key="apikey.uuid"
                >
                    <td>{{ i + 1 }} </td>
                    <td>{{ apikey.name }} </td>
                    <td>{{ apikey.key }} </td>
                    <td>
                        <Link
                        :href="route('apikeys.destroy', {apikey: apikey})" method="delete"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        as="button">
                        Supprimer
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
        apikeys : Array
    },
}
</script>

<script setup>
import TrackCard from '@/Components/Track/TrackCard.vue'
</script>