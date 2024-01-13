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
            <form action="" @submit.prevent="submitForm">
                <div class="py-10 px-10 ">
                <!--   tip; mx-auto -- jagab ilusti keskele  -->
                <div class="bg-white p-10 md:w-3/4 lg:w-1/2 mx-auto shadow-md rounded-xl">

                    <!--       flex - asjad korvuti, nb! flex-1 - element kogu ylejaanud laius -->
                    <div class="flex items-center mb-5">
                        <!--         tip - here neede inline-block , but why? -->
                        <label for="name" class="inline-block w-20 mr-6 text-right 
                                                font-bold text-gray-600">Nom :</label>
                        <input type="text" v-model="form.name" placeholder="Ma clé API"
                            class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 
                                    text-gray-600 placeholder-gray-400
                                    outline-none">
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