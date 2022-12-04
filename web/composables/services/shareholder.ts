import { useUserStore } from "~~/store/user";
import { useShareholderStore } from "~~/store/shareholder";
import { CreateShareholder, UpdateShareholder } from "~~/types/Shareholder";

export const useGetShareholder = async () => {
  const user = useUserStore();
  const shareholder = useShareholderStore();
  const { $api } = useNuxtApp();
  const response = await $api.shareholder.getAll(user.shop_id);

  watch(response.data, (newPosts) => {
    shareholder.$patch({
      list: newPosts,
    });
  });

  return {
    ...response,
    shareholders: shareholder.list,
  };
};

export const useCreateShareholder = async (data: CreateShareholder) => {
  const user = useUserStore();
  const { $api } = useNuxtApp();

  console.log(data, user.shop_id);

  const response = await $api.shareholder.create({
    ...data,
    shop_id: user.shop_id,
  });

  if (!response.error.value) {
    await useGetShareholder();
  }

  return response;
};

export const useUpdateShareholder = async (data: UpdateShareholder) => {
  const user = useUserStore();
  const { $api } = useNuxtApp();
  const response = await $api.shareholder.update({
    ...data,
    shop_id: user.shop_id,
  });

  useGetShareholder();

  return response;
};

export const useDeleteShareholder = async (shareholder_id: number) => {
  const { $api } = useNuxtApp();
  const response = await $api.shareholder.destroy(shareholder_id);

  useGetShareholder();

  return response;
};
