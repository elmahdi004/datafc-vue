<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import Inputabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import api from '@/axios';
import { reactive, ref } from 'vue';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = ref({
    email: '',
    password: '',
    // remember:false
});
const error = ref('');
const submit = () => {
api.post('/login',form.value).then(({data})=>{
  if(data.error){
    error.value = data.error;
  }else{
    error.value = '';
    window.location = '/'
  }

  console.log(data)
}).catch((e)=>console.log(e))
};
</script>

<template>
<AuthenticationCard>
    <Head title="login" />

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
      {{ 
        status
        }}
    </div>

    <form @submit.prevent="submit">
      <div class="mb-8">
        <InputLabel htmlFor="email">Email</InputLabel>
        <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autoFocus />
        <!-- <InputError class="mt-2" :message="form.errors.email" /> -->
      </div>

      <div class="mt-4">
        <InputLabel htmlFor="password">Mot de pass</InputLabel>
        <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password"  required autoComplete="current-password" />
        <!-- <InputError class="mt-2" :message="form.errors.password" /> -->
      </div>



      <div class="flex flex-col space-y-2 md:flex-row md:items-center md:justify-between md:space-y-0 mt-4">
        <!-- <div class="">
          <label class="flex items-center">
            <Checkbox name="remember" :checked="form.data.remember === 'on'" @change="e => form.setData('remember', e.currentTarget.checked ? 'on' : '')" />
            <span class="ml-2 text-sm text-gray-600 ">
              Gardez-moi connecté
            </span>
          </label>
        </div> -->
        <div v-if="canResetPassword">

          <Link :href="route('password.request')" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-chill-500 dark:focus:ring-offset-primary">
            Mot de passe oublié?
          </Link>
        </div>



      </div>
      <div>
        <PrimaryButton :newClass="['my-5 w-full items-center justify-center  py-3 ',  form.processing ? 'opacity-25' : '' ]" :disabled="form.processing">
        Se connecter
        </PrimaryButton>
      </div>
      <div class="flex items-center justify-center mt-4">
        <Link :href="route('register')" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-chill-500 dark:focus:ring-offset-primary">
          Tu n'as pas de compteS'inscrire
        </Link>
      </div>
              <InputError v-if="error" class="mt-2" :message="error" />
    </form>
  </AuthenticationCard>
</template>
