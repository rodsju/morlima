<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'morlima');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'example');

/** nome do host do MySQL */
define('DB_HOST', 'db:3306');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '>c)0~CLmHwTVi-fugPDHaId;=VJT8%Kn%i~yR@nU6a|abEB]ckcqoBK8G%,nE>;)>5A}tz1$=xttKvbAL*PWTMqQTD{(f+gNg>tv<_7Z6.,9~ee6k0$qVt]{Ty&x]sdQ');
define('SECURE_AUTH_KEY',  'Eb0DVz,S0izton-m|z&~Y+oVYW--__}!ael@JXGXsvkV@Ja?#YpW[]MGP{o&B5V>n+diGLa}&CI9p|K%[]*c@zvrVCKS*Vp,H1[qy1<CMOe+f_C^fVjn$)[z,/pMYc+j');
define('LOGGED_IN_KEY',    'o3Hc(wF]UBm~5I~9[]6P(Z;5.$t>9jxmbW5]bqnrt6-:QlpCm1<A67N-bH69,UH#,<D_Qdg/T^nC~vYe0[{J&RU<C-gE~8Pu~WA?]3G1Z*e7L^Zv+P(Lr[O!,^N5@)+Z');
define('NONCE_KEY',        'xqTpLuD*wiB=~W9CiN/K]lI9bBL?HT;/xnx))-+rl:P[OwP3Uhy_@H<E(s=QUM:.R{.le(6,)M(iq#*+qs)qK5Y|E>@Amv-i+}@vp+)kwtdMSLh(&_u9]1WPSx:>/qu*');
define('AUTH_SALT',        'a,@}DtwMn^YL?7E*5}keXwRPxSa1n0$0JytqSH/yN(IhFj-ZLiB{h#kULi&8yz[C:n0m1*nqgPzh=}wACHONOeq?3x*6jBlp{]y8CX76ANIA,d&+T-4iE=J8C{)O{i)f');
define('SECURE_AUTH_SALT', '<&fxS5KZW!?w(=hp.#vyrc8Il.#kfFpEPE#QvDwmF+^Sv(BLX?rMFy;DLcnf{L?9rr|*7mkiQJK#==%8[DgfqN^QM^+g1X+UOP;/,r;*,5UsEV_M7,fvR}@pYaI3Fk*G');
define('LOGGED_IN_SALT',   '0?nO6YZ=Uw>Cp4V270oAWIE/-;C9P0Cz!6qJ0aqYHVTkRXLJGzrD[-mW@UT?EmqZcb,q$W#<L+YG)*A!DLm;?w1kteX.!3p%zlMhO/0.@s{3g_3+J{0a1Uw,1,(b:UNu');
define('NONCE_SALT',       'QC0TZNrrI*<:H4bfiGdfn*:cKq}w{M^?]g*dR!Pll{i?K#)bw<<;aWTV<N5gziCFfKExx^V|P5~@#Va6E~&QTRi}.u.j]Ve(EF,8[jNuT/_933&iT+1FRFh;+NX}IR.V');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
