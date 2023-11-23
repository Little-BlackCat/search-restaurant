<template>
  <Head title="Find Restaurant" />

  <form @submit.prevent="searchRestaurant" class="w-[350px] sm:w-[600px] h-[80px] flex items-center mx-auto">
    <TextInput 
      type="text" 
      class="block w-full mr-2" 
      v-model="form.search" 
      autocomplete
      placeholder="Search for Restaurant" 
    />

    <PrimaryButton 
      class="h-[40px] ml-3" 
      :class="{ 'opacity-25 cursor-progress': form.processing }"
      :disable="form.processing"
    >
      Search
    </PrimaryButton>
  </form>

  <div 
    class="w-[350px] sm:w-[600px] mx-auto mt-8"
    v-if="restaurantData.length > 0"
  >
    <h1 class="text-right mb-1">Restaurant Result : 
      <span class="text-xl font-semibold text-green-700">
        {{ restaurantData.length }}
      </span>
    </h1>
    <div 
      class="border-2 border-rose-700 rounded-lg py-4 px-8 mb-8"
      v-for="restaurant in restaurantData"
    >
      <li class="gap-y-10 list-none">
        <h1 class="sm:inline-block text-xl font-bold">
          <img src="/fire.svg" alt="Fire Icon" class="w-6 h-6 inline-block">
          Restaurant name :
        </h1>
        <a :href="restaurant.source"
          target="_blank"
          class="font-semibold text-xl bg-orange-500 text-white ml-1 p-1 rounded-md hover:underline hover:duration-300">"{{ restaurant.title }}"</a>
        <h2 class="text-xl mt-4 font-bold">
          <img src="/pin.svg" alt="Map Pin" class="w-6 h-6 inline-block">
          Address :
          <span class="font-normal text-lg">
            {{ restaurant.address }}
          </span>
        </h2>
      </li>
    </div>
  </div>
  <div v-else-if="isLoading == true" class="text-center text-xl font-bold">
    Searching...
  </div>
  <div v-if="searchInitiated && restaurantData.length == 0" class="text-center text-xl font-bold">
    No restaurants found.
  </div>

</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3'
import axios from 'axios';
import { ref } from 'vue';

const form = useForm({
  search: 'Bang sue',
});

const restaurantData = ref([]);
const isLoading = ref(false);
const searchInitiated = ref(false);

// The `searchRestaurant` function is an asynchronous function that is triggered when the form is
// submitted.
async function searchRestaurant() {
  try {
    isLoading.value = true;
    searchInitiated.value = false;

    const response = await axios.post(`http://localhost/api/maps?keyword=${form.search}`);
    restaurantData.value = response.data[0].result;
    // console.log(restaurantData.value);

    isLoading.value = false;
    searchInitiated.value = true;
  } catch (error) {
    console.error('Error submitting form:', error);
    isLoading = false;
    searchInitiated = false;
  }
}

</script>

<style scoped></style>