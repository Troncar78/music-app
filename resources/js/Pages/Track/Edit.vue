<template>
    <MusicLayout>
        <template #title>
            Modifier la musique : {{ track.title }}
        </template>

        <template #action>
            <Link :href="route('tracks.index')">
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
                                                font-bold text-gray-600">Modifier le titre :</label>
                        <input type="text" v-model="form.title" placeholder="Shape of you"
                            class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 
                                    text-gray-600 placeholder-gray-400
                                    outline-none"
                                    :class="{ 'border-red-500': form.errors.title }">
                    </div>

                    <div class="flex items-center mb-5">
                        <!--         tip - here neede inline-block , but why? -->
                        <label for="artist" class="inline-block w-20 mr-6 text-right 
                                                font-bold text-gray-600">Modifier l'artiste :</label>
                        <input type="text" v-model="form.artist" placeholder="Ed Sheeran" 
                            class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 
                                    text-gray-600 placeholder-gray-400
                                    outline-none"
                                    :class="{ 'border-red-500': form.errors.artist }">
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

            <!-- <div class="max-w-lg mx-auto p-4">
                <span class="font-bold">Titre :</span> {{ form.title }} /
                <span class="font-bold">Artiste :</span> {{ form.artist }}
            </div> -->
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
        track: Object,
    },
    data() {
        return {
            test: '',
            form: this.$inertia.form({
                title: this.track.title,
                artist: this.track.artist,
                display: this.track.display ? true : false
            })
        }
    },
    methods: {
        submitForm() {
            this.form.put(route('tracks.update', {track : this.track}), {
            });
        }
    }
}
</script>