<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Input;

class OctaveController extends Controller
{
    public function index()
    {
       // $response = shell_exec("octave --no-gui --quiet ../../kyvadlo.txt {r}");      

        $command = Storage::get('octave/gulicka.txt');        

        $response = ltrim(shell_exec('octave --no-gui --quiet --eval "pkg load control;'. $command .'"'));   

        return response($response,200);
    }

    public function execute_octave_command(Request $request)
    {
        $data = $request->json()->all();

       $command = $data["command"];

       $result = ltrim(shell_exec('octave --no-gui --quiet --eval "'. $command .'"'));   

       $response = array(
           "result" => $result
       );

       return json_encode($response);
    }


    public function get_ball_data(Request $request)
    {
        try {
           
            return '0.00000 0.00000 0.00006 0.00025 0.00066 0.00138 0.00248 0.00400 0.00599 0.00846 0.01145 0.01495 0.01897 0.02350 0.02855 0.03409 0.04013 0.04663 0.05360 0.06100 0.06883 0.07706 0.08568 0.09466 0.10399 0.11365 0.12362 0.13388 0.14441 0.15519 0.16621 0.17745 0.18889 0.20052 0.21232 0.22427 0.23636 0.24857 0.26090 0.27332 0.28582 0.29839 0.31102 0.32369 0.33640 0.34913 0.36187 0.37461 0.38734 0.40005 0.41273 0.42538 0.43798 0.45053 0.46302 0.47544 0.48778 0.50004 0.51221 0.52429 0.53627 0.54814 0.55990 0.57154 0.58307 0.59446 0.60573 0.61687 0.62787 0.63873 0.64945 0.66002 0.67045 0.68072 0.69084 0.70081 0.71062 0.72028 0.72977 0.73910 0.74828 0.75729 0.76613 0.77482 0.78334 0.79169 0.79989 0.80791 0.81578 0.82347 0.83101 0.83838 0.84559 0.85264 0.85953 0.86626 0.87283 0.87924 0.88549 0.89159 0.89754 0.90333 0.90897 0.91446 0.91980 0.92500 0.93005 0.93496 0.93973 0.94435 0.94884 0.95320 0.95742 0.96150 0.96546 0.96929 0.97299 0.97657 0.98003 0.98336 0.98658 0.98969 0.99268 0.99556 0.99833 1.00099 1.00354 1.00600 1.00835 1.01060 1.01276 1.01482 1.01679 1.01867 1.02047 1.02217 1.02379 1.02533 1.02679 1.02817 1.02947 1.03070 1.03186 1.03295 1.03397 1.03492 1.03581 1.03663 1.03739 1.03810 1.03875 1.03934 1.03987 1.04036 1.04079 1.04118 1.04151 1.04181 1.04205 1.04226 1.04242 1.04255 1.04263 1.04268 1.04269 1.04267 1.04262 1.04254 1.04242 1.04228 1.04211 1.04191 1.04169 1.04144 1.04117 1.04088 1.04057 1.04024 1.03989 1.03952 1.03914 1.03874 1.03833 1.03790 1.03746 1.03700 1.03654 1.03607 1.03558 1.03509 1.03459 1.03408 1.03356 1.03304 1.03251 1.03198 1.03145 1.03091 1.03036 1.02982 1.02927 1.02872 1.02817 1.02762 1.02707 1.02652 1.02597 1.02542 1.02487 1.02433 1.02379 1.02325 1.02271 1.02218 1.02165 1.02112 1.02060 1.02008 1.01957 1.01906 1.01856 1.01806 1.01756 1.01708 1.01659 1.01612 1.01565 1.01519 1.01473 1.01428 1.01383 1.01339 1.01296 1.01254 1.01212 1.01171 1.01131 1.01091 1.01052 1.01014 1.00976 1.00939 1.00903 1.00868 1.00833 1.00799 1.00765 1.00733 1.00701 1.00670 1.00639 1.00609 1.00580 1.00552 1.00524 1.00497 1.00471 1.00445 1.00420 1.00395 1.00372 1.00348 1.00326 1.00304 1.00283 1.00262 1.00242 1.00223 1.00204 1.00185 1.00168 1.00151 1.00134 1.00118 1.00102 1.00087 1.00073 1.00059 1.00046 1.00033 1.00020 1.00008 0.99997 0.99986 0.99975 0.99965 0.99955 0.99946 0.99937 0.99928 0.99920 0.99912 0.99905 0.99898 0.99891 0.99885 0.99879 0.99873 0.99868 0.99863 0.99858 0.99854 0.99849 0.99846 0.99842 0.99839 0.99836 0.99833 0.99830 0.99828 0.99826 0.99824 0.99822 0.99821 0.99819 0.99818 0.99817 0.99817 0.99816 0.99816 0.99816 0.99815 0.99816 0.99816 0.99816 0.99817 0.99817 0.99818 0.99819 0.99820 0.99821 0.99822 0.99823 0.99825 0.99826 0.99827 0.99829 0.99831 0.99832 0.99834 0.99836 0.99838 0.99840 0.99842 0.99844 0.99846 0.99848 0.99850 0.99853 0.99855 0.99857 0.99859 0.99862 0.99864 0.99866 0.99869 0.99871 0.99873 0.99876 0.99878 0.99880 0.99883 0.99885 0.99888 0.99890 0.99892 0.99895 0.99897 0.99899 0.99902 0.99904 0.99906 0.99909 0.99911 0.99913 0.99915 0.99917 0.99920 0.99922 0.99924 0.99926 0.99928 0.99930 0.99932 0.99934 0.99936 0.99938 0.99940 0.99942 0.99944 0.99946 0.99947 0.99949 0.99951 0.99953 0.99954 0.99956 0.99958 0.99959 0.99961 0.99962 0.99964 0.99965 0.99967 0.99968 0.99970 0.99971 0.99972 0.99974 0.99975 0.99976 0.99977 0.99978 0.99980 0.99981 0.99982 0.99983 0.99984 0.99985 0.99986 0.99987 0.99988 0.99989 0.99989 0.99990 0.99991 0.99992 0.99993 0.99993 0.99994 0.99995 0.99996 0.99996 0.99997 0.99997 0.99998 0.99999 0.99999 1.00000 1.00000 1.00001 1.00001 1.00001 1.00002 1.00002 1.00003 1.00003 1.00003 1.00004 1.00004 1.00004 1.00005 1.00005 1.00005 1.00005 1.00006 1.00006 1.00006 1.00006 1.00006 1.00007 1.00007 1.00007 1.00007 1.00007 1.00007 1.00007 1.00008 1.00008 1.00008 1.00008 1.00008 1.00008 1.00008 1.00008 1.00008 1.00008 1.00008 1.00008 1.00008 1.00008 1.00008 1.00008 1.00008 1.00008 1.00008 1.00008 1.00008 1.00008 1.00008 1.00008 1.00008 1.00007 1.00007 1.00007 1.00007 1.00007 1.00007 1.00007 1.00007 1.00007 " [2]=> string(7017) " 0.0000e+00 3.5813e-05 1.0513e-04 1.7744e-04 2.4127e-04 2.9328e-04 3.3349e-04 3.6313e-04 3.8375e-04 3.9687e-04 4.0386e-04 4.0587e-04 4.0387e-04 3.9867e-04 3.9093e-04 3.8120e-04 3.6993e-04 3.5746e-04 3.4412e-04 3.3013e-04 3.1570e-04 3.0099e-04 2.8613e-04 2.7122e-04 2.5635e-04 2.4160e-04 2.2702e-04 2.1265e-04 1.9853e-04 1.8468e-04 1.7114e-04 1.5791e-04 1.4500e-04 1.3244e-04 1.2022e-04 1.0835e-04 9.6827e-05 8.5658e-05 7.4839e-05 6.4369e-05 5.4246e-05 4.4467e-05 3.5027e-05 2.5922e-05 1.7148e-05 8.6996e-06 5.7166e-07 -7.2414e-06 -1.4745e-05 -2.1945e-05 -2.8848e-05 -3.5458e-05 -4.1783e-05 -4.7828e-05 -5.3600e-05 -5.9103e-05 -6.4345e-05 -6.9332e-05 -7.4069e-05 -7.8562e-05 -8.2818e-05 -8.6843e-05 -9.0641e-05 -9.4220e-05 -9.7585e-05 -1.0074e-04 -1.0369e-04 -1.0645e-04 -1.0902e-04 -1.1139e-04 -1.1359e-04 -1.1562e-04 -1.1747e-04 -1.1916e-04 -1.2069e-04 -1.2206e-04 -1.2329e-04 -1.2437e-04 -1.2531e-04 -1.2611e-04 -1.2679e-04 -1.2733e-04 -1.2776e-04 -1.2807e-04 -1.2827e-04 -1.2836e-04 -1.2834e-04 -1.2823e-04 -1.2802e-04 -1.2772e-04 -1.2732e-04 -1.2685e-04 -1.2629e-04 -1.2566e-04 -1.2495e-04 -1.2417e-04 -1.2333e-04 -1.2242e-04 -1.2145e-04 -1.2043e-04 -1.1935e-04 -1.1821e-04 -1.1703e-04 -1.1581e-04 -1.1454e-04 -1.1323e-04 -1.1189e-04 -1.1051e-04 -1.0909e-04 -1.0765e-04 -1.0618e-04 -1.0468e-04 -1.0316e-04 -1.0162e-04 -1.0006e-04 -9.8484e-05 -9.6891e-05 -9.5285e-05 -9.3666e-05 -9.2038e-05 -9.0401e-05 -8.8758e-05 -8.7109e-05 -8.5457e-05 -8.3802e-05 -8.2147e-05 -8.0492e-05 -7.8839e-05 -7.7189e-05 -7.5543e-05 -7.3903e-05 -7.2268e-05 -7.0642e-05 -6.9023e-05 -6.7414e-05 -6.5815e-05 -6.4228e-05 -6.2652e-05 -6.1088e-05 -5.9539e-05 -5.8003e-05 -5.6482e-05 -5.4976e-05 -5.3487e-05 -5.2013e-05 -5.0557e-05 -4.9118e-05 -4.7697e-05 -4.6295e-05 -4.4911e-05 -4.3546e-05 -4.2200e-05 -4.0875e-05 -3.9569e-05 -3.8283e-05 -3.7018e-05 -3.5773e-05 -3.4549e-05 -3.3346e-05 -3.2164e-05 -3.1003e-05 -2.9863e-05 -2.8745e-05 -2.7648e-05 -2.6572e-05 -2.5517e-05 -2.4484e-05 -2.3472e-05 -2.2482e-05 -2.1512e-05 -2.0564e-05 -1.9637e-05 -1.8731e-05 -1.7846e-05 -1.6981e-05 -1.6137e-05 -1.5313e-05 -1.4510e-05 -1.3727e-05 -1.2964e-05 -1.2220e-05 -1.1496e-05 -1.0792e-05 -1.0106e-05 -9.4400e-06 -8.7923e-06 -8.1631e-06 -7.5522e-06 -6.9593e-06 -6.3842e-06 -5.8266e-06 -5.2863e-06 -4.7631e-06 -4.2567e-06 -3.7668e-06 -3.2931e-06 -2.8354e-06 -2.3935e-06 -1.9669e-06 -1.5556e-06 -1.1592e-06 -7.7743e-07 -4.1001e-07 -5.6681e-08 2.8284e-07 6.0883e-07 9.2156e-07 1.2213e-06 1.5083e-06 1.7829e-06 2.0454e-06 2.2959e-06 2.5348e-06 2.7624e-06 2.9788e-06 3.1845e-06 3.3796e-06 3.5644e-06 3.7391e-06 3.9041e-06 4.0595e-06 4.2056e-06 4.3428e-06 4.4711e-06 4.5909e-06 4.7024e-06 4.8059e-06 4.9015e-06 4.9895e-06 5.0702e-06 5.1437e-06 5.2103e-06 5.2702e-06 5.3237e-06 5.3708e-06 5.4119e-06 5.4472e-06 5.4768e-06 5.5009e-06 5.5198e-06 5.5336e-06 5.5425e-06 5.5467e-06 5.5464e-06 5.5418e-06 5.5330e-06 5.5203e-06 5.5036e-06 5.4834e-06 5.4596e-06 5.4325e-06 5.4021e-06 5.3688e-06 5.3325e-06 5.2935e-06 5.2518e-06 5.2077e-06 5.1612e-06 5.1125e-06 5.0617e-06 5.0089e-06 4.9542e-06 4.8978e-06 4.8398e-06 4.7803e-06 4.7193e-06 4.6571e-06 4.5936e-06 4.5290e-06 4.4634e-06 4.3969e-06 4.3295e-06 4.2614e-06 4.1926e-06 4.1232e-06 4.0533e-06 3.9829e-06 3.9122e-06 3.8412e-06 3.7700e-06 3.6986e-06 3.6271e-06 3.5556e-06 3.4841e-06 3.4126e-06 3.3413e-06 3.2702e-06 3.1993e-06 3.1286e-06 3.0583e-06 2.9883e-06 2.9188e-06 2.8496e-06 2.7810e-06 2.7128e-06 2.6452e-06 2.5782e-06 2.5118e-06 2.4460e-06 2.3809e-06 2.3165e-06 2.2527e-06 2.1897e-06 2.1275e-06 2.0660e-06 2.0054e-06 1.9455e-06 1.8865e-06 1.8282e-06 1.7709e-06 1.7144e-06 1.6587e-06 1.6040e-06 1.5501e-06 1.4972e-06 1.4451e-06 1.3940e-06 1.3437e-06 1.2944e-06 1.2460e-06 1.1985e-06 1.1519e-06 1.1063e-06 1.0616e-06 1.0178e-06 9.7490e-07 9.3294e-07 8.9189e-07 8.5176e-07 8.1252e-07 7.7419e-07 7.3676e-07 7.0022e-07 6.6455e-07 6.2977e-07 5.9586e-07 5.6281e-07 5.3061e-07 4.9926e-07 4.6875e-07 4.3907e-07 4.1020e-07 3.8215e-07 3.5490e-07 3.2843e-07 3.0275e-07 2.7784e-07 2.5368e-07 2.3028e-07 2.0761e-07 1.8566e-07 1.6444e-07 1.4391e-07 1.2408e-07 1.0493e-07 8.6443e-08 6.8616e-08 5.1435e-08 3.4887e-08 1.8960e-08 3.6433e-09 -1.1076e-08 -2.5209e-08 -3.8769e-08 -5.1766e-08 -6.4213e-08 -7.6122e-08 -8.7504e-08 -9.8371e-08 -1.0874e-07 -1.1861e-07 -1.2800e-07 -1.3692e-07 -1.4539e-07 -1.5341e-07 -1.6100e-07 -1.6816e-07 -1.7491e-07 -1.8125e-07 -1.8721e-07 -1.9279e-07 -1.9799e-07 -2.0284e-07 -2.0734e-07 -2.1150e-07 -2.1533e-07 -2.1884e-07 -2.2204e-07 -2.2494e-07 -2.2755e-07 -2.2988e-07 -2.3194e-07 -2.3374e-07 -2.3528e-07 -2.3658e-07 -2.3764e-07 -2.3847e-07 -2.3909e-07 -2.3949e-07 -2.3969e-07 -2.3969e-07 -2.3951e-07 -2.3914e-07 -2.3860e-07 -2.3790e-07 -2.3703e-07 -2.3602e-07 -2.3486e-07 -2.3356e-07 -2.3213e-07 -2.3057e-07 -2.2889e-07 -2.2710e-07 -2.2520e-07 -2.2320e-07 -2.2110e-07 -2.1891e-07 -2.1664e-07 -2.1428e-07 -2.1185e-07 -2.0935e-07 -2.0678e-07 -2.0415e-07 -2.0147e-07 -1.9873e-07 -1.9594e-07 -1.9311e-07 -1.9024e-07 -1.8733e-07 -1.8439e-07 -1.8141e-07 -1.7842e-07 -1.7540e-07 -1.7236e-07 -1.6931e-07 -1.6624e-07 -1.6316e-07 -1.6008e-07 -1.5699e-07 -1.5390e-07 -1.5081e-07 -1.4772e-07 -1.4464e-07 -1.4156e-07 -1.3850e-07 -1.3544e-07 -1.3240e-07 -1.2938e-07 -1.2637e-07 -1.2338e-07 -1.2041e-07 -1.1747e-07 -1.1454e-07 -1.1164e-07 -1.0877e-07 -1.0593e-07 -1.0311e-07 -1.0032e-07 -9.7568e-08 -9.4843e-08 -9.2151e-08 -8.9492e-08 -8.6867e-08 -8.4277e-08 -8.1723e-08 -7.9204e-08 -7.6723e-08 -7.4278e-08 -7.1871e-08 -6.9502e-08 -6.7171e-08 -6.4879e-08 -6.2627e-08 -6.0413e-08 -5.8239e-08 -5.6104e-08 -5.4009e-08 -5.1954e-08 -4.9938e-08 -4.7963e-08 -4.6027e-08 -4.4132e-08 -4.2275e-08 -4.0459e-08 -3.8682e-08 -3.6944e-08 -3.5246e-08 -3.3586e-08 -3.1966e-08 -3.0383e-08 -2.8839e-08 -2.7333e-08 -2.5865e-08 -2.4433e-08 -2.3039e-08 -2.1682e-08 -2.0360e-08 -1.9075e-08 -1.7824e-08 -1.6609e-08 -1.5429e-08 " [3]=> string(5512) " 0.00000 0.01000 0.02000 0.03000 0.04000 0.05000 0.06000 0.07000 0.08000 0.09000 0.10000 0.11000 0.12000 0.13000 0.14000 0.15000 0.16000 0.17000 0.18000 0.19000 0.20000 0.21000 0.22000 0.23000 0.24000 0.25000 0.26000 0.27000 0.28000 0.29000 0.30000 0.31000 0.32000 0.33000 0.34000 0.35000 0.36000 0.37000 0.38000 0.39000 0.40000 0.41000 0.42000 0.43000 0.44000 0.45000 0.46000 0.47000 0.48000 0.49000 0.50000 0.51000 0.52000 0.53000 0.54000 0.55000 0.56000 0.57000 0.58000 0.59000 0.60000 0.61000 0.62000 0.63000 0.64000 0.65000 0.66000 0.67000 0.68000 0.69000 0.70000 0.71000 0.72000 0.73000 0.74000 0.75000 0.76000 0.77000 0.78000 0.79000 0.80000 0.81000 0.82000 0.83000 0.84000 0.85000 0.86000 0.87000 0.88000 0.89000 0.90000 0.91000 0.92000 0.93000 0.94000 0.95000 0.96000 0.97000 0.98000 0.99000 1.00000 1.01000 1.02000 1.03000 1.04000 1.05000 1.06000 1.07000 1.08000 1.09000 1.10000 1.11000 1.12000 1.13000 1.14000 1.15000 1.16000 1.17000 1.18000 1.19000 1.20000 1.21000 1.22000 1.23000 1.24000 1.25000 1.26000 1.27000 1.28000 1.29000 1.30000 1.31000 1.32000 1.33000 1.34000 1.35000 1.36000 1.37000 1.38000 1.39000 1.40000 1.41000 1.42000 1.43000 1.44000 1.45000 1.46000 1.47000 1.48000 1.49000 1.50000 1.51000 1.52000 1.53000 1.54000 1.55000 1.56000 1.57000 1.58000 1.59000 1.60000 1.61000 1.62000 1.63000 1.64000 1.65000 1.66000 1.67000 1.68000 1.69000 1.70000 1.71000 1.72000 1.73000 1.74000 1.75000 1.76000 1.77000 1.78000 1.79000 1.80000 1.81000 1.82000 1.83000 1.84000 1.85000 1.86000 1.87000 1.88000 1.89000 1.90000 1.91000 1.92000 1.93000 1.94000 1.95000 1.96000 1.97000 1.98000 1.99000 2.00000 2.01000 2.02000 2.03000 2.04000 2.05000 2.06000 2.07000 2.08000 2.09000 2.10000 2.11000 2.12000 2.13000 2.14000 2.15000 2.16000 2.17000 2.18000 2.19000 2.20000 2.21000 2.22000 2.23000 2.24000 2.25000 2.26000 2.27000 2.28000 2.29000 2.30000 2.31000 2.32000 2.33000 2.34000 2.35000 2.36000 2.37000 2.38000 2.39000 2.40000 2.41000 2.42000 2.43000 2.44000 2.45000 2.46000 2.47000 2.48000 2.49000 2.50000 2.51000 2.52000 2.53000 2.54000 2.55000 2.56000 2.57000 2.58000 2.59000 2.60000 2.61000 2.62000 2.63000 2.64000 2.65000 2.66000 2.67000 2.68000 2.69000 2.70000 2.71000 2.72000 2.73000 2.74000 2.75000 2.76000 2.77000 2.78000 2.79000 2.80000 2.81000 2.82000 2.83000 2.84000 2.85000 2.86000 2.87000 2.88000 2.89000 2.90000 2.91000 2.92000 2.93000 2.94000 2.95000 2.96000 2.97000 2.98000 2.99000 3.00000 3.01000 3.02000 3.03000 3.04000 3.05000 3.06000 3.07000 3.08000 3.09000 3.10000 3.11000 3.12000 3.13000 3.14000 3.15000 3.16000 3.17000 3.18000 3.19000 3.20000 3.21000 3.22000 3.23000 3.24000 3.25000 3.26000 3.27000 3.28000 3.29000 3.30000 3.31000 3.32000 3.33000 3.34000 3.35000 3.36000 3.37000 3.38000 3.39000 3.40000 3.41000 3.42000 3.43000 3.44000 3.45000 3.46000 3.47000 3.48000 3.49000 3.50000 3.51000 3.52000 3.53000 3.54000 3.55000 3.56000 3.57000 3.58000 3.59000 3.60000 3.61000 3.62000 3.63000 3.64000 3.65000 3.66000 3.67000 3.68000 3.69000 3.70000 3.71000 3.72000 3.73000 3.74000 3.75000 3.76000 3.77000 3.78000 3.79000 3.80000 3.81000 3.82000 3.83000 3.84000 3.85000 3.86000 3.87000 3.88000 3.89000 3.90000 3.91000 3.92000 3.93000 3.94000 3.95000 3.96000 3.97000 3.98000 3.99000 4.00000 4.01000 4.02000 4.03000 4.04000 4.05000 4.06000 4.07000 4.08000 4.09000 4.10000 4.11000 4.12000 4.13000 4.14000 4.15000 4.16000 4.17000 4.18000 4.19000 4.20000 4.21000 4.22000 4.23000 4.24000 4.25000 4.26000 4.27000 4.28000 4.29000 4.30000 4.31000 4.32000 4.33000 4.34000 4.35000 4.36000 4.37000 4.38000 4.39000 4.40000 4.41000 4.42000 4.43000 4.44000 4.45000 4.46000 4.47000 4.48000 4.49000 4.50000 4.51000 4.52000 4.53000 4.54000 4.55000 4.56000 4.57000 4.58000 4.59000 4.60000 4.61000 4.62000 4.63000 4.64000 4.65000 4.66000 4.67000 4.68000 4.69000 4.70000 4.71000 4.72000 4.73000 4.74000 4.75000 4.76000 4.77000 4.78000 4.79000 4.80000 4.81000 4.82000 4.83000 4.84000 4.85000 4.86000 4.87000 4.88000 4.89000 4.90000 4.91000 4.92000 4.93000 4.94000 4.95000 4.96000 4.97000 4.98000 4.99000 5.00000" } {"position":["","0.00000","0.00000","0.00006","0.00025","0.00066","0.00138","0.00248","0.00400","0.00599","0.00846","0.01145","0.01495","0.01897","0.02350","0.02855","0.03409","0.04013","0.04663","0.05360","0.06100","0.06883","0.07706","0.08568","0.09466","0.10399","0.11365","0.12362","0.13388","0.14441","0.15519","0.16621","0.17745","0.18889","0.20052","0.21232","0.22427","0.23636","0.24857","0.26090","0.27332","0.28582","0.29839","0.31102","0.32369","0.33640","0.34913","0.36187","0.37461","0.38734","0.40005","0.41273","0.42538","0.43798","0.45053","0.46302","0.47544","0.48778","0.50004","0.51221","0.52429","0.53627","0.54814","0.55990","0.57154","0.58307","0.59446","0.60573","0.61687","0.62787","0.63873","0.64945","0.66002","0.67045","0.68072","0.69084","0.70081","0.71062","0.72028","0.72977","0.73910","0.74828","0.75729","0.76613","0.77482","0.78334","0.79169","0.79989","0.80791","0.81578","0.82347","0.83101","0.83838","0.84559","0.85264","0.85953","0.86626","0.87283","0.87924","0.88549","0.89159","0.89754","0.90333","0.90897","0.91446","0.91980","0.92500","0.93005","0.93496","0.93973","0.94435","0.94884","0.95320","0.95742","0.96150","0.96546","0.96929","0.97299","0.97657","0.98003","0.98336","0.98658","0.98969","0.99268","0.99556","0.99833","1.00099","1.00354","1.00600","1.00835","1.01060","1.01276","1.01482","1.01679","1.01867","1.02047","1.02217","1.02379","1.02533","1.02679","1.02817","1.02947","1.03070","1.03186","1.03295","1.03397","1.03492","1.03581","1.03663","1.03739","1.03810","1.03875","1.03934","1.03987","1.04036","1.04079","1.04118","1.04151","1.04181","1.04205","1.04226","1.04242","1.04255","1.04263","1.04268","1.04269","1.04267","1.04262","1.04254","1.04242","1.04228","1.04211","1.04191","1.04169","1.04144","1.04117","1.04088","1.04057","1.04024","1.03989","1.03952","1.03914","1.03874","1.03833","1.03790","1.03746","1.03700","1.03654","1.03607","1.03558","1.03509","1.03459","1.03408","1.03356","1.03304","1.03251","1.03198","1.03145","1.03091","1.03036","1.02982","1.02927","1.02872","1.02817","1.02762","1.02707","1.02652","1.02597","1.02542","1.02487","1.02433","1.02379","1.02325","1.02271","1.02218","1.02165","1.02112","1.02060","1.02008","1.01957","1.01906","1.01856","1.01806","1.01756","1.01708","1.01659","1.01612","1.01565","1.01519","1.01473","1.01428","1.01383","1.01339","1.01296","1.01254","1.01212","1.01171","1.01131","1.01091","1.01052","1.01014","1.00976","1.00939","1.00903","1.00868","1.00833","1.00799","1.00765","1.00733","1.00701","1.00670","1.00639","1.00609","1.00580","1.00552","1.00524","1.00497","1.00471","1.00445","1.00420","1.00395","1.00372","1.00348","1.00326","1.00304","1.00283","1.00262","1.00242","1.00223","1.00204","1.00185","1.00168","1.00151","1.00134","1.00118","1.00102","1.00087","1.00073","1.00059","1.00046","1.00033","1.00020","1.00008","0.99997","0.99986","0.99975","0.99965","0.99955","0.99946","0.99937","0.99928","0.99920","0.99912","0.99905","0.99898","0.99891","0.99885","0.99879","0.99873","0.99868","0.99863","0.99858","0.99854","0.99849","0.99846","0.99842","0.99839","0.99836","0.99833","0.99830","0.99828","0.99826","0.99824","0.99822","0.99821","0.99819","0.99818","0.99817","0.99817","0.99816","0.99816","0.99816","0.99815","0.99816","0.99816","0.99816","0.99817","0.99817","0.99818","0.99819","0.99820","0.99821","0.99822","0.99823","0.99825","0.99826","0.99827","0.99829","0.99831","0.99832","0.99834","0.99836","0.99838","0.99840","0.99842","0.99844","0.99846","0.99848","0.99850","0.99853","0.99855","0.99857","0.99859","0.99862","0.99864","0.99866","0.99869","0.99871","0.99873","0.99876","0.99878","0.99880","0.99883","0.99885","0.99888","0.99890","0.99892","0.99895","0.99897","0.99899","0.99902","0.99904","0.99906","0.99909","0.99911","0.99913","0.99915","0.99917","0.99920","0.99922","0.99924","0.99926","0.99928","0.99930","0.99932","0.99934","0.99936","0.99938","0.99940","0.99942","0.99944","0.99946","0.99947","0.99949","0.99951","0.99953","0.99954","0.99956","0.99958","0.99959","0.99961","0.99962","0.99964","0.99965","0.99967","0.99968","0.99970","0.99971","0.99972","0.99974","0.99975","0.99976","0.99977","0.99978","0.99980","0.99981","0.99982","0.99983","0.99984","0.99985","0.99986","0.99987","0.99988","0.99989","0.99989","0.99990","0.99991","0.99992","0.99993","0.99993","0.99994","0.99995","0.99996","0.99996","0.99997","0.99997","0.99998","0.99999","0.99999","1.00000","1.00000","1.00001","1.00001","1.00001","1.00002","1.00002","1.00003","1.00003","1.00003","1.00004","1.00004","1.00004","1.00005","1.00005","1.00005","1.00005","1.00006","1.00006","1.00006","1.00006","1.00006","1.00007","1.00007","1.00007","1.00007","1.00007","1.00007","1.00007","1.00008","1.00008","1.00008","1.00008","1.00008","1.00008","1.00008","1.00008","1.00008","1.00008","1.00008","1.00008","1.00008","1.00008","1.00008","1.00008","1.00008","1.00008","1.00008","1.00008","1.00008","1.00008","1.00008","1.00008","1.00008","1.00007","1.00007","1.00007","1.00007","1.00007","1.00007","1.00007","1.00007","1.00007"],"angle":["","0.0000e+00","3.5813e-05","1.0513e-04","1.7744e-04","2.4127e-04","2.9328e-04","3.3349e-04","3.6313e-04","3.8375e-04","3.9687e-04","4.0386e-04","4.0587e-04","4.0387e-04","3.9867e-04","3.9093e-04","3.8120e-04","3.6993e-04","3.5746e-04","3.4412e-04","3.3013e-04","3.1570e-04","3.0099e-04","2.8613e-04","2.7122e-04","2.5635e-04","2.4160e-04","2.2702e-04","2.1265e-04","1.9853e-04","1.8468e-04","1.7114e-04","1.5791e-04","1.4500e-04","1.3244e-04","1.2022e-04","1.0835e-04","9.6827e-05","8.5658e-05","7.4839e-05","6.4369e-05","5.4246e-05","4.4467e-05","3.5027e-05","2.5922e-05","1.7148e-05","8.6996e-06","5.7166e-07","-7.2414e-06","-1.4745e-05","-2.1945e-05","-2.8848e-05","-3.5458e-05","-4.1783e-05","-4.7828e-05","-5.3600e-05","-5.9103e-05","-6.4345e-05","-6.9332e-05","-7.4069e-05","-7.8562e-05","-8.2818e-05","-8.6843e-05","-9.0641e-05","-9.4220e-05","-9.7585e-05","-1.0074e-04","-1.0369e-04","-1.0645e-04","-1.0902e-04","-1.1139e-04","-1.1359e-04","-1.1562e-04","-1.1747e-04","-1.1916e-04","-1.2069e-04","-1.2206e-04","-1.2329e-04","-1.2437e-04","-1.2531e-04","-1.2611e-04","-1.2679e-04","-1.2733e-04","-1.2776e-04","-1.2807e-04","-1.2827e-04","-1.2836e-04","-1.2834e-04","-1.2823e-04","-1.2802e-04","-1.2772e-04","-1.2732e-04","-1.2685e-04","-1.2629e-04","-1.2566e-04","-1.2495e-04","-1.2417e-04","-1.2333e-04","-1.2242e-04","-1.2145e-04","-1.2043e-04","-1.1935e-04","-1.1821e-04","-1.1703e-04","-1.1581e-04","-1.1454e-04","-1.1323e-04","-1.1189e-04","-1.1051e-04","-1.0909e-04","-1.0765e-04","-1.0618e-04","-1.0468e-04","-1.0316e-04","-1.0162e-04","-1.0006e-04","-9.8484e-05","-9.6891e-05","-9.5285e-05","-9.3666e-05","-9.2038e-05","-9.0401e-05","-8.8758e-05","-8.7109e-05","-8.5457e-05","-8.3802e-05","-8.2147e-05","-8.0492e-05","-7.8839e-05","-7.7189e-05","-7.5543e-05","-7.3903e-05","-7.2268e-05","-7.0642e-05","-6.9023e-05","-6.7414e-05","-6.5815e-05","-6.4228e-05","-6.2652e-05","-6.1088e-05","-5.9539e-05","-5.8003e-05","-5.6482e-05","-5.4976e-05","-5.3487e-05","-5.2013e-05","-5.0557e-05","-4.9118e-05","-4.7697e-05","-4.6295e-05","-4.4911e-05","-4.3546e-05","-4.2200e-05","-4.0875e-05","-3.9569e-05","-3.8283e-05","-3.7018e-05","-3.5773e-05","-3.4549e-05","-3.3346e-05","-3.2164e-05","-3.1003e-05","-2.9863e-05","-2.8745e-05","-2.7648e-05","-2.6572e-05","-2.5517e-05","-2.4484e-05","-2.3472e-05","-2.2482e-05","-2.1512e-05","-2.0564e-05","-1.9637e-05","-1.8731e-05","-1.7846e-05","-1.6981e-05","-1.6137e-05","-1.5313e-05","-1.4510e-05","-1.3727e-05","-1.2964e-05","-1.2220e-05","-1.1496e-05","-1.0792e-05","-1.0106e-05","-9.4400e-06","-8.7923e-06","-8.1631e-06","-7.5522e-06","-6.9593e-06","-6.3842e-06","-5.8266e-06","-5.2863e-06","-4.7631e-06","-4.2567e-06","-3.7668e-06","-3.2931e-06","-2.8354e-06","-2.3935e-06","-1.9669e-06","-1.5556e-06","-1.1592e-06","-7.7743e-07","-4.1001e-07","-5.6681e-08","2.8284e-07","6.0883e-07","9.2156e-07","1.2213e-06","1.5083e-06","1.7829e-06","2.0454e-06","2.2959e-06","2.5348e-06","2.7624e-06","2.9788e-06","3.1845e-06","3.3796e-06","3.5644e-06","3.7391e-06","3.9041e-06","4.0595e-06","4.2056e-06","4.3428e-06","4.4711e-06","4.5909e-06","4.7024e-06","4.8059e-06","4.9015e-06","4.9895e-06","5.0702e-06","5.1437e-06","5.2103e-06","5.2702e-06","5.3237e-06","5.3708e-06","5.4119e-06","5.4472e-06","5.4768e-06","5.5009e-06","5.5198e-06","5.5336e-06","5.5425e-06","5.5467e-06","5.5464e-06","5.5418e-06","5.5330e-06","5.5203e-06","5.5036e-06","5.4834e-06","5.4596e-06","5.4325e-06","5.4021e-06","5.3688e-06","5.3325e-06","5.2935e-06","5.2518e-06","5.2077e-06","5.1612e-06","5.1125e-06","5.0617e-06","5.0089e-06","4.9542e-06","4.8978e-06","4.8398e-06","4.7803e-06","4.7193e-06","4.6571e-06","4.5936e-06","4.5290e-06","4.4634e-06","4.3969e-06","4.3295e-06","4.2614e-06","4.1926e-06","4.1232e-06","4.0533e-06","3.9829e-06","3.9122e-06","3.8412e-06","3.7700e-06","3.6986e-06","3.6271e-06","3.5556e-06","3.4841e-06","3.4126e-06","3.3413e-06","3.2702e-06","3.1993e-06","3.1286e-06","3.0583e-06","2.9883e-06","2.9188e-06","2.8496e-06","2.7810e-06","2.7128e-06","2.6452e-06","2.5782e-06","2.5118e-06","2.4460e-06","2.3809e-06","2.3165e-06","2.2527e-06","2.1897e-06","2.1275e-06","2.0660e-06","2.0054e-06","1.9455e-06","1.8865e-06","1.8282e-06","1.7709e-06","1.7144e-06","1.6587e-06","1.6040e-06","1.5501e-06","1.4972e-06","1.4451e-06","1.3940e-06","1.3437e-06","1.2944e-06","1.2460e-06","1.1985e-06","1.1519e-06","1.1063e-06","1.0616e-06","1.0178e-06","9.7490e-07","9.3294e-07","8.9189e-07","8.5176e-07","8.1252e-07","7.7419e-07","7.3676e-07","7.0022e-07","6.6455e-07","6.2977e-07","5.9586e-07","5.6281e-07","5.3061e-07","4.9926e-07","4.6875e-07","4.3907e-07","4.1020e-07","3.8215e-07","3.5490e-07","3.2843e-07","3.0275e-07","2.7784e-07","2.5368e-07","2.3028e-07","2.0761e-07","1.8566e-07","1.6444e-07","1.4391e-07","1.2408e-07","1.0493e-07","8.6443e-08","6.8616e-08","5.1435e-08","3.4887e-08","1.8960e-08","3.6433e-09","-1.1076e-08","-2.5209e-08","-3.8769e-08","-5.1766e-08","-6.4213e-08","-7.6122e-08","-8.7504e-08","-9.8371e-08","-1.0874e-07","-1.1861e-07","-1.2800e-07","-1.3692e-07","-1.4539e-07","-1.5341e-07","-1.6100e-07","-1.6816e-07","-1.7491e-07","-1.8125e-07","-1.8721e-07","-1.9279e-07","-1.9799e-07","-2.0284e-07","-2.0734e-07","-2.1150e-07","-2.1533e-07","-2.1884e-07","-2.2204e-07","-2.2494e-07","-2.2755e-07","-2.2988e-07","-2.3194e-07","-2.3374e-07","-2.3528e-07","-2.3658e-07","-2.3764e-07","-2.3847e-07","-2.3909e-07","-2.3949e-07","-2.3969e-07","-2.3969e-07","-2.3951e-07","-2.3914e-07","-2.3860e-07","-2.3790e-07","-2.3703e-07","-2.3602e-07","-2.3486e-07","-2.3356e-07","-2.3213e-07","-2.3057e-07","-2.2889e-07","-2.2710e-07","-2.2520e-07","-2.2320e-07","-2.2110e-07","-2.1891e-07","-2.1664e-07","-2.1428e-07","-2.1185e-07","-2.0935e-07","-2.0678e-07","-2.0415e-07","-2.0147e-07","-1.9873e-07","-1.9594e-07","-1.9311e-07","-1.9024e-07","-1.8733e-07","-1.8439e-07","-1.8141e-07","-1.7842e-07","-1.7540e-07","-1.7236e-07","-1.6931e-07","-1.6624e-07","-1.6316e-07","-1.6008e-07","-1.5699e-07","-1.5390e-07","-1.5081e-07","-1.4772e-07","-1.4464e-07","-1.4156e-07","-1.3850e-07","-1.3544e-07","-1.3240e-07","-1.2938e-07","-1.2637e-07","-1.2338e-07","-1.2041e-07","-1.1747e-07","-1.1454e-07","-1.1164e-07","-1.0877e-07","-1.0593e-07","-1.0311e-07","-1.0032e-07","-9.7568e-08","-9.4843e-08","-9.2151e-08","-8.9492e-08","-8.6867e-08","-8.4277e-08","-8.1723e-08","-7.9204e-08","-7.6723e-08","-7.4278e-08","-7.1871e-08","-6.9502e-08","-6.7171e-08","-6.4879e-08","-6.2627e-08","-6.0413e-08","-5.8239e-08","-5.6104e-08","-5.4009e-08","-5.1954e-08","-4.9938e-08","-4.7963e-08","-4.6027e-08","-4.4132e-08","-4.2275e-08","-4.0459e-08","-3.8682e-08","-3.6944e-08","-3.5246e-08","-3.3586e-08","-3.1966e-08","-3.0383e-08","-2.8839e-08","-2.7333e-08","-2.5865e-08","-2.4433e-08","-2.3039e-08","-2.1682e-08","-2.0360e-08","-1.9075e-08","-1.7824e-08","-1.6609e-08","-1.5429e-08"],"time":["","0.00000","0.01000","0.02000","0.03000","0.04000","0.05000","0.06000","0.07000","0.08000","0.09000","0.10000","0.11000","0.12000","0.13000","0.14000","0.15000","0.16000","0.17000","0.18000","0.19000","0.20000","0.21000","0.22000","0.23000","0.24000","0.25000","0.26000","0.27000","0.28000","0.29000","0.30000","0.31000","0.32000","0.33000","0.34000","0.35000","0.36000","0.37000","0.38000","0.39000","0.40000","0.41000","0.42000","0.43000","0.44000","0.45000","0.46000","0.47000","0.48000","0.49000","0.50000","0.51000","0.52000","0.53000","0.54000","0.55000","0.56000","0.57000","0.58000","0.59000","0.60000","0.61000","0.62000","0.63000","0.64000","0.65000","0.66000","0.67000","0.68000","0.69000","0.70000","0.71000","0.72000","0.73000","0.74000","0.75000","0.76000","0.77000","0.78000","0.79000","0.80000","0.81000","0.82000","0.83000","0.84000","0.85000","0.86000","0.87000","0.88000","0.89000","0.90000","0.91000","0.92000","0.93000","0.94000","0.95000","0.96000","0.97000","0.98000","0.99000","1.00000","1.01000","1.02000","1.03000","1.04000","1.05000","1.06000","1.07000","1.08000","1.09000","1.10000","1.11000","1.12000","1.13000","1.14000","1.15000","1.16000","1.17000","1.18000","1.19000","1.20000","1.21000","1.22000","1.23000","1.24000","1.25000","1.26000","1.27000","1.28000","1.29000","1.30000","1.31000","1.32000","1.33000","1.34000","1.35000","1.36000","1.37000","1.38000","1.39000","1.40000","1.41000","1.42000","1.43000","1.44000","1.45000","1.46000","1.47000","1.48000","1.49000","1.50000","1.51000","1.52000","1.53000","1.54000","1.55000","1.56000","1.57000","1.58000","1.59000","1.60000","1.61000","1.62000","1.63000","1.64000","1.65000","1.66000","1.67000","1.68000","1.69000","1.70000","1.71000","1.72000","1.73000","1.74000","1.75000","1.76000","1.77000","1.78000","1.79000","1.80000","1.81000","1.82000","1.83000","1.84000","1.85000","1.86000","1.87000","1.88000","1.89000","1.90000","1.91000","1.92000","1.93000","1.94000","1.95000","1.96000","1.97000","1.98000","1.99000","2.00000","2.01000","2.02000","2.03000","2.04000","2.05000","2.06000","2.07000","2.08000","2.09000","2.10000","2.11000","2.12000","2.13000","2.14000","2.15000","2.16000","2.17000","2.18000","2.19000","2.20000","2.21000","2.22000","2.23000","2.24000","2.25000","2.26000","2.27000","2.28000","2.29000","2.30000","2.31000","2.32000","2.33000","2.34000","2.35000","2.36000","2.37000","2.38000","2.39000","2.40000","2.41000","2.42000","2.43000","2.44000","2.45000","2.46000","2.47000","2.48000","2.49000","2.50000","2.51000","2.52000","2.53000","2.54000","2.55000","2.56000","2.57000","2.58000","2.59000","2.60000","2.61000","2.62000","2.63000","2.64000","2.65000","2.66000","2.67000","2.68000","2.69000","2.70000","2.71000","2.72000","2.73000","2.74000","2.75000","2.76000","2.77000","2.78000","2.79000","2.80000","2.81000","2.82000","2.83000","2.84000","2.85000","2.86000","2.87000","2.88000","2.89000","2.90000","2.91000","2.92000","2.93000","2.94000","2.95000","2.96000","2.97000","2.98000","2.99000","3.00000","3.01000","3.02000","3.03000","3.04000","3.05000","3.06000","3.07000","3.08000","3.09000","3.10000","3.11000","3.12000","3.13000","3.14000","3.15000","3.16000","3.17000","3.18000","3.19000","3.20000","3.21000","3.22000","3.23000","3.24000","3.25000","3.26000","3.27000","3.28000","3.29000","3.30000","3.31000","3.32000","3.33000","3.34000","3.35000","3.36000","3.37000","3.38000","3.39000","3.40000","3.41000","3.42000","3.43000","3.44000","3.45000","3.46000","3.47000","3.48000","3.49000","3.50000","3.51000","3.52000","3.53000","3.54000","3.55000","3.56000","3.57000","3.58000","3.59000","3.60000","3.61000","3.62000","3.63000","3.64000","3.65000","3.66000","3.67000","3.68000","3.69000","3.70000","3.71000","3.72000","3.73000","3.74000","3.75000","3.76000","3.77000","3.78000","3.79000","3.80000","3.81000","3.82000","3.83000","3.84000","3.85000","3.86000","3.87000","3.88000","3.89000","3.90000","3.91000","3.92000","3.93000","3.94000","3.95000","3.96000","3.97000","3.98000","3.99000","4.00000","4.01000","4.02000","4.03000","4.04000","4.05000","4.06000","4.07000","4.08000","4.09000","4.10000","4.11000","4.12000","4.13000","4.14000","4.15000","4.16000","4.17000","4.18000","4.19000","4.20000","4.21000","4.22000","4.23000","4.24000","4.25000","4.26000","4.27000","4.28000","4.29000","4.30000","4.31000","4.32000","4.33000","4.34000","4.35000","4.36000","4.37000","4.38000","4.39000","4.40000","4.41000","4.42000","4.43000","4.44000","4.45000","4.46000","4.47000","4.48000","4.49000","4.50000","4.51000","4.52000","4.53000","4.54000","4.55000","4.56000","4.57000","4.58000","4.59000","4.60000","4.61000","4.62000","4.63000","4.64000","4.65000","4.66000","4.67000","4.68000","4.69000","4.70000","4.71000","4.72000","4.73000","4.74000","4.75000","4.76000","4.77000","4.78000","4.79000","4.80000","4.81000","4.82000","4.83000","4.84000","4.85000","4.86000","4.87000","4.88000","4.89000","4.90000","4.91000","4.92000","4.93000","4.94000","4.95000","4.96000","4.97000","4.98000","4.99000","5.00000"]}';


        $query = ($request->query());

        $r = $query["r"];
        $startPosition = $query["startPosition"];
        $startSpeed = $query["startSpeed"];

        $command = $this->get_ball_script($r,$startPosition,$startSpeed);

        $response = trim(shell_exec('octave --no-gui --quiet --eval "pkg load control;'. $command .'"'));


        $parsed = explode("ans =",$response);		

        $position = explode('  ',$parsed[1]);
        $alfa = explode('  ',$parsed[2]);

	$position = array_map('trim', $position);
	$alfa = array_map('trim',$alfa);
       
        $return = array(
            "position" => $position,
            "angle" => $alfa
        );

    


        return json_encode($return);
        } catch (\Throwable $th) {
//throw $th;         
  	 return response("Error",500);
        }


    }



    private function get_ball_script($r,$startPosition,$startSpeed)
    {
        return "
                m = 0.111;
                R = 0.015;
                g = -9.8;
                J = 9.99e-6;
                H = -m*g/(J/(R^2)+m);
                A = [0 1 0 0; 0 0 H 0; 0 0 0 1; 0 0 0 0];
                B = [0;0;0;1];
                C = [1 0 0 0];
                D = [0];   
                K = place(A,B,[-2+2i,-2-2i,-20,-80]);
                N = -inv(C*inv(A-B*K)*B);

                sys = ss(A-B*K,B,C,D);

                t = 0:0.01:5;
                r = ". $r . ";
                initPozicia= " . $startPosition . ";
                initRychlost= " . $startSpeed . ";
                [y,t,x]=lsim(N*sys,r*ones(size(t)),t,[initPozicia;0;initRychlost;0]);
                N*x(:,1)
                x(:,3)
                ";
    }
}
