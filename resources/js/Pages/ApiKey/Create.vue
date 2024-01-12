<template>
    <MusicLayout>
        <template #title>
            Créer une clé api
        </template>

        <template #action>
            <Link 
            v-if="$page.props.isAdmin"
            :href="route('tracks.index')"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">
            Retour
            </Link>
        </template>

        <template #content>
            <form action="" class="max-w-lg mx-auto p-4 shadow-md rounded" @submit.prevent="submitForm">

                <!-- NOM -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name :</label>
                    <input type="text" v-model="form.name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        :class="{ 'border-red-500': form.errors.name }">
                </div>

                <!-- ENVOYER -->
                <div class="mb-4">
                    <input type="submit" value="Créer"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                </div>
            </form>

        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'
export default {
    components: {
        MusicLayout,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: '',
            })
        }
    },
    methods: {
        submitForm() {
            this.form.post(route('apikeys.store'), {
            });
        }
    }
}
</script>