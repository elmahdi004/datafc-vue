<template lang="">
<ClientLayout title="Accueil" :auth="user ? user : null">
<Hero/>
<section>
<Slider/>
</section>
<section>
<SectionDirecteur/>
</section>
<section>
    <NosValeurs/>
</section>
<section>
<NotreMission/>
</section>
<section className='bg-white'>
<Engagement />
</section>
<Statistics/>
<section className='overflow-hidden '>
        <FeatureCards />
      </section>
      <section>
        <NosClient/>
      </section>
      <Desc/>
</ClientLayout>

</template>
<script setup>
import ClientLayout from "../../Layouts/ClientLayout.vue";
import Hero from "../Hero/index.vue"
import Slider from "../slider/Slider.vue";
import SectionDirecteur from "../sectionDirecteur/SectionDirecteur.vue";
import NosValeurs from "../NosValeurs/NosValeurs.vue";
import NotreMission from "../notreMission/NotreMission.vue";
import Engagement from "../engagement/Engagement.vue";
import Statistics from "./Statistics.vue";
import FeatureCards from "../FeatureCards/FeatureCards.vue";
import NosClient from "../NosClient/NosClient.vue";
import Desc from "../desc/Desc.vue";
import {defineProps} from 'vue'
const props = defineProps(['user']);
</script>
<style lang="">
    
</style>