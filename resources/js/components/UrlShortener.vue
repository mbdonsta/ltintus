<template>
    <div class="w-1/2 max-w-full p-10">
        <h1 class="text-2xl font-bold text-center mb-10">
            Welcome to URL Shortener App
        </h1>
        <form
            class="relative mb-4 flex w-full flex-wrap items-stretch"
            :class="{ 'opacity-40': loading }"
            @submit.prevent="shortenUrl"
        >
            <input
                class="border flex-1 p-3 outline-0 focus:border-sky-600"
                type="text"
                v-model="form.destination_url"
                placeholder="Enter destination url to be shortened"
            />
            <button class="bg-sky-600 px-3 text-white" :disabled="loading">
                Make It Short!
            </button>
        </form>
        <div v-if="errors.destination_url">
            <p class="text-red-600" v-text="errors.destination_url[0]"></p>
        </div>
        <div v-if="result">
            <p>Your URL was shortened</p>
            <div class="p-5 bg-white">
                <a
                    class="underline"
                    :href="result.short_url"
                    target="_blank"
                    v-text="result.short_url"
                ></a>
                ->
                <span v-text="result.destination_url"></span>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props: {
        shortenUrlRoute: {
            type: String,
            required: true,
        },
    },
    data: () => {
        return {
            loading: false,
            form: {
                destination_url: "",
            },
            errors: [],
            result: null,
        };
    },
    methods: {
        shortenUrl() {
            if (this.loading) {
                return false;
            }

            this.loading = true;
            this.errors = [];
            this.result = null;

            axios
                .post(this.shortenUrlRoute, this.form)
                .then((resp) => {
                    this.result = resp.data.data;
                    this.loading = false;
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                    this.loading = false;
                });
        },
    },
};
</script>
