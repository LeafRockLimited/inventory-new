<template>
    <Head title="Produk" />
    <AuthenticatedLayout>
        <div class="grid grid-cols-1 gap-6">
            <div class="navbar px-6 xl:px-28 flex flex-col justify-center items-start py-2 space-y-6">
              
                <!-- end alert -->
                <p class="text-lg">Data Gudang</p>
                <Link 
                    class="text-sm text-custom-red inline-flex"
                    :href="route('dashboard')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3" viewBox="0 0 24 24"><path fill="currentColor" d="m9.55 12l7.35 7.35q.375.375.363.875t-.388.875q-.375.375-.875.375t-.875-.375l-7.7-7.675q-.3-.3-.45-.675t-.15-.75q0-.375.15-.75t.45-.675l7.7-7.7q.375-.375.888-.363t.887.388q.375.375.375.875t-.375.875z"/></svg>
                        <span>dashboard</span>
                </Link>
            </div>
            <div class="w-full px-6 xl:px-28 grid grid-cols-1 gap-6" >
                
                <div class="join w-fit">
                    <button class="btn bg-white join-item">Overview</button>
                    <button class="btn bg-white join-item">List</button>
                </div>
                    
                <div class="grid grid-flow-row grid-cols-4 gap-4">

                    <div class="stats shadow">
                        <div class="stat">
                            <div class="stat-title">Gudang Aktif</div>
                            <div class="stat-value">
                                {{ gudang_aktif_count }}
                            </div>
                            <!-- <div class="stat-desc">Gudang Aktif</div> -->
                        </div>
                    </div>
                    <div class="stats shadow">
                        <div class="stat">
                            <div class="stat-title">Total Gudang</div>
                            <div class="stat-value">
                                {{ gudang_count }}
                            </div>
                            <!-- <div class="stat-desc">Gudang Aktif</div> -->
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

export default {
    components:{
        Head, AuthenticatedLayout ,Link
    },
    props:{
        gudang_count:Number,
        gudang_aktif_count:Number
    }
}
</script>