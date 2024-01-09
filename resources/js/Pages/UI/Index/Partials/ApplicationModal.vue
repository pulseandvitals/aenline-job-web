<script setup>
import { useForm } from "@inertiajs/vue3";
import { nextTick, ref } from "vue";
import Modal from "@/Components/Modal.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";

const props = defineProps({
    job_id: String,
    employer_id: String,
});
const applyModal = ref(false);
const form = useForm({
    temp_file: "",
    job_id: props.job_id,
    employer_id: props.employer_id,
    short_message: "",
    applicant_email: "",
});

const applyModalButton = () => {
    applyModal.value = true;
};
const closeModal = () => {
    applyModal.value = false;

    form.reset();
};
</script>
<template>
    <PrimaryButton @click="applyModalButton()"> Apply </PrimaryButton>
    <Modal :show="applyModal" @close="closeModal">
        <form
            @submit.prevent="form.post(route('store-application'))"
            enctype="multipart/form-data"
        >
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Submit your Resume here..
                </h2>

                <div class="mt-6">
                    <InputLabel for="File" value="File" />

                    <input
                        id="company_logo"
                        type="file"
                        class="mt-1 block w-full"
                        @input="form.temp_file = $event.target.files[0]"
                    />

                    <InputError :message="form.errors.temp_file" class="mt-2" />
                </div>

                <div class="mt-6">
                    <InputLabel for="Email" value="Email" />

                    <TextInput
                        id="company_logo"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.applicant_email"
                    />

                    <InputError
                        :message="form.errors.applicant_email"
                        class="mt-2"
                    />
                </div>

                <div class="mt-6">
                    <InputLabel for="File" value="Message" />

                    <textarea
                        id="company_logo"
                        type="text"
                        rows="3"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                        v-model="form.short_message"
                    />
                    <span class="text-gray-300 text-xs">
                        You can send links of your portfolios, short messages,
                        or why you are fit with this job.
                    </span>
                    <InputError
                        :message="form.errors.short_message"
                        class="mt-2"
                    />
                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal">
                        Cancel
                    </SecondaryButton>

                    <PrimaryButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Submit
                    </PrimaryButton>
                </div>
            </div>
        </form>
    </Modal>
</template>
