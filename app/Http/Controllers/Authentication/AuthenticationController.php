<?php

namespace App\Http\Controllers\Authentication;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function retourneViewInscription()
    {
        return view('authentication.authentication-signup');
    }
    public function retourneViewConnexion()
    {
        return view('authentication.authentication-signin');
    }
    public function retourneViewReunitialiserMotDePasse()
    {
        if($value = session('user'))
        {
            return view('authentication.authentication-reset-password');
        }
        return redirect('authentication/connexion');
    }
    public function retourneViewmMotDePasseOublie()
    {
        return view('authentication.authentication-forgot-password');

    }
    // Enregistrer un utilisateur
    public function enregisterUser(Request $Cords)
    {
        $rules= [
            'nom' => 'required|max:20',
            'prenom' => 'required|max:35',
            'email'=>'required|unique:users,email',
            'password'=>'required|same:pwd2',
            'term'=>'required',
            'pays'=>'required',
        ];
        $messages=[
            'required' => 'Veillez entrer votre :attribute .',
            'term.required'=>'Veillez cocher les terms de confidentialite',
            'same'=>'Les mots de passe ne sont pas conforme',
            'unique'=>'L\'email est deja utilise',
            'max'=>'Le :attribute ne doit pas depasse :max',
            'pays.required'=>'Veuillez selectionner votre pays',
        ];
        $attribute=[
            'pwd1'=>'Mot de passe',
            'pwd2'=>'Mot de passe',
        ];
        $validator = Validator::make($Cords->all(), $rules, $messages, $attribute);
        if($validator->fails())
        {
            return redirect('authentication/inscription')
            ->withErrors($validator)
            ->withInput();
        }
        $Cords->input('term')=='on'?$term=1:$term=0;
        $User = new  User();
        $User->nom=$Cords->input('nom');
        $User->prenom=$Cords->input('prenom');
        $User->email=$Cords->input('email');
        $User->pays=$Cords->input('pays');
        $User->term=$term;
        $User->password=Hash::make($Cords->input('pwd1'));;
        if($User->save())
        {
            return redirect('authentication/connexion')->with('success', 'Votre Compte a ete cree avec succes');
        }
    }
    public function motDePasseOublieTraitement(Request $email)
    {
        $rules= [
            'email'=>'required|email|exists:users,email',
        ];
        $messages=[
            'required' => 'Veillez entrer votre :attribute .',
            'exists'=>'l\'email ne correspond a aucun compte',
            'email'=>'Veuillez saisir un email valable',
        ];
        // $attribute=[
        //     'pwd1'=>'Mot de passe',
        //     'pwd2'=>'Mot de passe',
        // ];
        $validator = Validator::make($email->all(), $rules, $messages);
        if($validator->fails())
        {
            return redirect('authentication/mot-de-passe-oublie')
            ->withErrors($validator)
            ->withInput();
        }

        $User = DB:: table('Users')
        ->where('email', $email->input('email'))
        ->get()->first();
        session(['user' => $User]);
        $value = session('user');
        if ( $User) {
            return redirect('authentication/renitialise-mot-de-passe')
            ->withInput();
        }
    }
    public function reinitialiserMotDePasseTraitement(Request $donnees)
    {
        $value = session('user');
        $rules= [
            'npwd1'=>'required|same:npwd2',
        ];
        $messages=[
            'required' => 'Veillez entrer votre :attribute .',
            'same'=>'Les mots de passe ne sont pas conforme',
        ];
        $attribute=[
            'npwd1'=>'Mot de passe',
            'npwd2'=>'Mot de passe',
        ];
        $validator = Validator::make($donnees->all(), $rules, $messages, $attribute);
        if($validator->fails())
        {
            return redirect('authentication/renitialise-mot-de-passe')
            ->withErrors($validator)
            ->withInput();
        }
       
        $User= DB::table('users')
              ->where('id_users',$value->id_users)
              ->update(['password' =>Hash::make($donnees->input('npwd1'))]);
        if($User)
        {
            return redirect('authentication/connexion')->with('success', 'Votre mot de passe a ete modifie avec succes');
        }
        
    }
    public function connexionTraitement(Request $coords)
    {
        $rules= [
            'email'=>'required|email|exists:users,email',
        ];
        $messages=[
            'required' => 'Veillez entrer votre :attribute .',
            'exists'=>'l\'email ne correspond a aucun compte',
            'email'=>'Veuillez saisir un email valable',
        ];
        $attribute=[
            'password'=>'Mot de passe',
        ];
        $validator = Validator::make($coords->all(), $rules, $messages, $attribute);
        if($validator->fails())
        {
            return back()
            ->withErrors($validator)
            ->withInput();
        }

        $credentials = $coords->validate([
            'email' => ['required', 'email'],
            'pwd' => ['required'],
        ]);
        if (Auth::attempt(['email'=>$coords->input('email'),'password'=>$coords->input('pwd')],$coords->input('sesourvenir'))) {
            $coords->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        else
        {
            return back()->withErrors([
                'email' => 'Les informations d\'identification fournies ne correspondent pas à nos dossiers.',
            ])
            ->withInput();
        }
       
    }
}
