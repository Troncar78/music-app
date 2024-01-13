<template>
    <MusicLayout>
        <template #title>
            Créer une musique
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
            <form action="" @submit.prevent="submitForm">
                <div class="py-12 px-10 ">
                <!--   tip; mx-auto -- jagab ilusti keskele  -->
                <div class="bg-white p-10 md:w-3/4 lg:w-1/2 mx-auto shadow-md rounded-xl">

                    <!--       flex - asjad korvuti, nb! flex-1 - element kogu ylejaanud laius -->
                    <div class="flex items-center mb-5">
                        <!--         tip - here neede inline-block , but why? -->
                        <label for="title" class="inline-block w-20 mr-6 text-right 
                                                font-bold text-gray-600">Titre :</label>
                        <input type="text" v-model="form.title" placeholder="Shape of you"
                            class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 
                                    text-gray-600 placeholder-gray-400
                                    outline-none">
                    </div>

                    <div class="flex items-center mb-5">
                        <!--         tip - here neede inline-block , but why? -->
                        <label for="artist" class="inline-block w-20 mr-6 text-right 
                                                font-bold text-gray-600">Artiste :</label>
                        <input type="text" v-model="form.artist" placeholder="Ed Sheeran" 
                            class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 
                                    text-gray-600 placeholder-gray-400
                                    outline-none">
                    </div>

                    <div class="flex items-center mb-5">
                        <!--         tip - here neede inline-block , but why? -->
                        <label for="image" class="inline-block w-20 mr-6 text-right 
                                                font-bold text-gray-600">Miniature :</label>
                        <input type="file" @input="form.image = $event.target.files[0]" name="image" id="image"
                            class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 
                                    text-gray-600 placeholder-gray-400
                                    outline-none">
                    </div>

                    <div class="flex items-center mb-5">
                        <!--         tip - here neede inline-block , but why? -->
                        <label for="music" class="inline-block w-20 mr-6 text-right 
                                                font-bold text-gray-600">Audio :</label>
                        <input type="file" @input="form.music = $event.target.files[0]" name="music" id="music"
                            class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 
                                    text-gray-600 placeholder-gray-400
                                    outline-none">
                    </div>

                    <div class="flex items-center mb-5">
                        <!--         tip - here neede inline-block , but why? -->
                        <label for="number" class="inline-block w-20 mr-6 text-right 
                                                font-bold text-gray-600">Afficher :</label>
                        <select name="display" id="display" v-model="form.display">
                            <option :value="true">Oui</option>
                            <option :value="false">Non</option>
                        </select>
                    </div>
                    <div class="text-right">
                        <button class="py-3 px-8 bg-blue-500 hover:bg-blue-600 text-white font-bold">Envoyer</button> 
                    </div>
                </div>
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
            test: '',
            form: this.$inertia.form({
                title: '',
                artist: '',
                image: null,
                music: null,
                display: true
            })
        }
    },
    methods: {
        submitForm() {
            this.form.post(route('tracks.store'), {
            });
        }
    }
}
</script>