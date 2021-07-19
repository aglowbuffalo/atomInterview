<template>
    <form @submit.prevent="submit">

            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" v-model="fields.name" placeholder="Your name" maxlength="50"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg " value="">

                <div id="nameError" class="text-red-600 mt-1 mb-2 text-sm" v-if="errors && errors.name">
                    {{ errors.name[0] }}
                </div>

            </div>

            <div class="mb-4">
                <label for="email" class="sr-only">Name</label>
                <input type="email" name="email" v-model="fields.email" id="email" placeholder="Your email" maxlength="50"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg  " value="">
            </div>
            <div id="emailError" class="text-red-600 mt-1 mb-2 text-sm" v-if="errors && errors.email">
                {{ errors.email[0] }}
            </div>


            <div class="mb-4">
                <label for="phone" class="sr-only">Name</label>
                <input type="phone" name="phone" v-model="fields.phone" id="phone" placeholder="Your phone"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg " value="">
            </div>

            <div id="phoneError" class="text-red-600 mt-1 mb-2 text-sm" v-if="errors && errors.phone">
                {{ errors.phone[0] }}
            </div>


            <div class="mb-4">
                <label for="message" class="sr-only">Name</label>
                <textarea  name="message" v-model="fields.message" id="message" placeholder="Your message"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg " rows="8"></textarea>
            </div>

            <div id="messageError" class="text-red-600 mt-1 mb-2 text-sm" v-if="errors && errors.message">
                {{ errors.message[0] }}
            </div>

            <div>
                <button type="submit" id="contact-submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full relative hover:bg-green-700 min-h-full">
                    <svg id="button-loader" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white absolute mx-auto  left-1/2 h-1/2" v-bind:class="{ invisible: load }"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                      </svg>
                    <span id="text-button" v-bind:class = "(load)?'':'invisible'">Submit</span>
                </button>
            </div>

        </form>
</template>

<script>
export default {
    data() {
        return {
            categories: null,
            fields: {},
            success: false,
            load: true,
            flag: true,
            errors: {}
        }
    },
    methods: {
          submit() {
                if(this.load){
                    this.load = false;

                    axios.post('http://localhost/InterviewExercise/public/contact', this.fields).then(response => {
                    this.fields = {};
                    this.success = true;
                    this.errors = {};
                    this.load = true;

                    }).catch(error => {
                        if (error.response.status == 422) {
                            this.errors = error.response.data.errors;
                        }
                        this.load = true;
                    });

                }

            }
    }

}
console.log();
</script>
