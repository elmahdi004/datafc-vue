<template lang="">
<footer class="relative z-10 pt-14 pb-10 lg:pt-[120px] lg:pb-20">
                <div class="container">
                    <div class="flex flex-wrap -mx-4">
                        <div class="w-full px-4 sm:w-2/3 lg:w-3/12">
                            <div class="w-full mb-10">
                                <a href="/#" class="mb-6 inline-block max-w-[160px]">
                                    <img
                                        src="/images/datafc_v_normale.svg"
                                        alt="logo"
                                        class="max-w-full"
                                    />
                                </a>
                                <p class="text-base mb-7 text-body-color">
                                    {data.description}
                                </p>
                                <p class="flex items-center text-sm font-medium text-dark my-2">
                                    <span class="mr-3 text-primary">
                                    <i class="fa-solid fa-phone"></i>
                                    </span>
                                    <span class="text-body-color">+212675343730</span>
                                </p>
                                <p class="flex items-center text-sm font-medium text-dark my-2">
                                    <span class="mr-3 text-primary">
                                    <i class="fa-solid fa-phone"></i>
                                    <span> + </span> 
                                    <i class="fa-brands fa-whatsapp text-base font-semibold"></i>
                                    </span>
                                    <span class="text-body-color">+212665010211</span>
                                </p>
                                <p class="flex items-center text-sm font-medium text-dark my-2">
                                    <span class="mr-3 text-primary">
                                    <i class="fa-solid fa-phone"></i>
                                    </span>
                                    <span class="text-body-color">+212664198892</span>
                                </p>
                                {/* <p class="flex items-center text-sm mt-3 font-medium text-dark">
                                    <span class="mr-3 text-primary">
                                    <i class="fa-solid fa-fax"></i>
                                    </span>
                                    <span>{data.fix}</span>
                                </p> */}
                            </div>
                        </div>
                        <LinkGroup header="Entreprise">
                            <NavLink link="/" label="Accueil" />
                            <NavLink link="/sommes-nous" label="Qui sommes nous" />
                            <NavLink link="/contact-nous" label="Contact" />
                        </LinkGroup>
                        <LinkGroup header="Nos Servises">
                            <NavLink link="//ingenierie-de-formation" label="Ingénierie de formation" />
                            <NavLink link="/formation" label="Formation" />
                            <NavLink link="/assistance-conseil-en-recrutement" label="Assistance conseil en recrutement" />
                        </LinkGroup>
                        <LinkGroup header="Formation">
                            <NavLink link="/formations-interentreprises" label="Formations interentreprises" />
                            <NavLink link="/#" label="Nos formations" />
                        </LinkGroup>
                        <div class="w-full px-4 sm:w-1/2 lg:w-3/12">
                            <div class="w-full mb-10">
                                <h4 class="text-lg font-semibold mb-9 text-dark">
                                Suivez-nous
                                </h4>
                                <div class="flex items-center mb-6">
                                    <a
                                        href={data.link_linkedin}
                                        class="mr-3 flex h-8 w-8 items-center justify-center rounded-full border border-[#E5E5E5] text-dark hover:border-primary hover:bg-primary hover:text-white sm:mr-4 lg:mr-3 xl:mr-4"
                                    >
<i class="fa-brands fa-linkedin-in"></i>                                    </a>
                                    <a
                                        href={data.link_facebook}
                                        class="mr-3 flex h-8 w-8 items-center justify-center rounded-full border border-[#E5E5E5] text-dark hover:border-primary hover:bg-primary hover:text-white sm:mr-4 lg:mr-3 xl:mr-4"
                                    >
                       <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                    <a
                                        href={data.link_instagram}
                                        class="mr-3 flex h-8 w-8 items-center justify-center rounded-full border border-[#E5E5E5] text-dark hover:border-primary hover:bg-primary hover:text-white sm:mr-4 lg:mr-3 xl:mr-4"
                                    >
             <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </div>
                                <p class="text-base mb-2 text-body-color">
                                   Adresse : Avenue De La Liberte N° 13 Immeble Goumrizid Ville Nouvelle - Safi
                                </p>
                                
                                <p class="text-base text-body-color">
                                    © {new Date().getFullYear()} {data.site_name}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <div>
                </div>
            </footer>
</template>
<script setup>
import NavLink from './NavLink.vue';
</script>
<style lang="">
    
</style>