import {useForm } from '@inertiajs/react';
import { LoaderCircle } from 'lucide-react';
import { FormEventHandler } from 'react';

import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
export default function Register() {
    const { data, setData, post, processing} = useForm({
        name: '',
        description: '',
        birthDay: '',
        species: '',
        habitat: '',
        country: ''
    });

    const submit: FormEventHandler = (e) => {
        e.preventDefault()
        post(route('form'));
    };

    return (
            <form className="flex flex-col gap-6" onSubmit={submit}>
                <div className="grid gap-6">
                    <div className="grid gap-2">
                        <Label htmlFor="name">Nome</Label>
                        <Input
                            id="name"
                            type="text"
                            required
                            autoFocus
                            tabIndex={1}
                            autoComplete="name"
                            value={data.name}
                            onChange={(e) => setData('name', e.target.value)}
                            disabled={processing}
                            placeholder="Nome do animal"
                        />
                    </div>

                    <div className="grid gap-2">
                        <Label htmlFor="description">Descrição</Label>
                        <Input
                            id="description"
                            type="text"
                            required
                            tabIndex={2}
                            value={data.description}
                            onChange={(e) => setData('description', e.target.value)}
                            disabled={processing}
                            placeholder="Fale mais sobre o animal"
                        />
                    </div>

                    <div className="grid gap-2">
                        <Label htmlFor="birthday">Data de nascimento</Label>
                        <Input
                            id="birthday"
                            type="text"
                            required
                            tabIndex={3}
                            value={data.birthDay}
                            onChange={(e) => setData('birthDay', e.target.value)}
                            disabled={processing}
                            placeholder="12/12/2012"
                        />
                    </div>

                    <div className="grid gap-2">
                        <Label htmlFor="species">Espécie</Label>
                        <Input
                            id="species"
                            type="text"
                            required
                            tabIndex={4}
                            value={data.species}
                            onChange={(e) => setData('species', e.target.value)}
                            disabled={processing}
                            placeholder="Espécie do animal"
                        />
                    </div>

                    <div className="grid gap-2">
                        <Label htmlFor="habitat">Habitat</Label>
                        <Input
                            id="habitat"
                            type="text"
                            required
                            tabIndex={5}
                            value={data.habitat}
                            onChange={(e) => setData('habitat', e.target.value)}
                            disabled={processing}
                            placeholder="Habitat do animal"
                        />
                    </div>

                    <div className="grid gap-2">
                        <Label htmlFor="country">País de origem</Label>
                        <Input
                            id="country"
                            type="text"
                            required
                            tabIndex={6}
                            value={data.country}
                            onChange={(e) => setData('country', e.target.value)}
                            disabled={processing}
                            placeholder="Brasil"
                        />
                    </div>

                    <Button type="submit" className="mt-2 w-full" tabIndex={7} disabled={processing}>
                        {processing && <LoaderCircle className="h-4 w-4 animate-spin" />}
                        Criando animal
                    </Button>
                </div>
            </form>
    );
}
