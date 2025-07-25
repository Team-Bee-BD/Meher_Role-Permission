<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <?php echo e(__('Permissions')); ?>

            </h2>
            <a href="<?php echo e(route('roles.create')); ?> " class="bg-slate-700 text-sm rounded-md btn btn-dark px-3 py-3" >Create</a>
        </div>
       
     <?php $__env->endSlot(); ?>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<?php if (isset($component)) { $__componentOriginal88b0e6813f5b80100a19437aa80e29ba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal88b0e6813f5b80100a19437aa80e29ba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.message','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal88b0e6813f5b80100a19437aa80e29ba)): ?>
<?php $attributes = $__attributesOriginal88b0e6813f5b80100a19437aa80e29ba; ?>
<?php unset($__attributesOriginal88b0e6813f5b80100a19437aa80e29ba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88b0e6813f5b80100a19437aa80e29ba)): ?>
<?php $component = $__componentOriginal88b0e6813f5b80100a19437aa80e29ba; ?>
<?php unset($__componentOriginal88b0e6813f5b80100a19437aa80e29ba); ?>
<?php endif; ?>

         <table class="w-full">
            <thead>
                <tr class="border-b">
                    <th class="px-6 py-3 text-left" width="60">#</th>
                    <th class="px-6 py-3 text-left">Name</th>
                    <th class="px-6 py-3 text-left">Permission</th>
                    <th class="px-6 py-3 text-left" width="180" >Created</th>
                    <th class="px-6 py-3 text-center" width="180">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                <?php if($roles->isNotEmpty()): ?>
                 <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <tr class="border-b">
                    <td class="px-6 py-3 text-left"><?php echo e($role->id); ?></td>
                    <td class="px-6 py-3 text-left"><?php echo e($role->name); ?></td>
                    <td class="px-6 py-3 text-left"><?php echo e($role->permissions->pluck('name')->implode(' ,')); ?></td>
                    <td class="px-6 py-3 text-left"><?php echo e(\Carbon\Carbon::parse($role->created_at) ->format('d M, Y')); ?></td>
                    <td class="px-6 py-3 text-center"> 

                        <a href="javscript:void(0);"onclick ="deleteRole(<?php echo e($role->id); ?>)" class="bg-red-600 text-sm rounded-md text-white px-3 py-3 hover:bg-red-500" >Delete</a>
                 
                    </td>
                </tr> 
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                <?php endif; ?>
              
            </tbody>
         </table>
        </div>
    </div>
     <?php $__env->slot('script ', null, []); ?> 
        <script type="text/javascript" > 
            function deleteRole(id){
                if (confirm('Áre you sure you want to delete ?')){
$.ajax({
    url:'',
    type: 'delete',
    data: {id:id},
    dataType: 'json',
    headers: {
        'x-csrf-token' : '<?php echo e(csrf_token()); ?>'
    }
    success: function(response){
window .location.href ='<?php echo e(route("roles.index")); ?>'
    }

});
   }

            }
        </script>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\ACI\Desktop\practice\project\resources\views/roles/list.blade.php ENDPATH**/ ?>