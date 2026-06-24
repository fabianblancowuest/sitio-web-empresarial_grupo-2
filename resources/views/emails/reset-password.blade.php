<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecé tu contraseña · CodeBridge</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'DM Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #f1f5f9; color: #0f172a; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f1f5f9; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 24px; overflow: hidden; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -4px rgba(0, 0, 0, 0.05);">
                    <!-- Header -->
                    <tr>
                        <td style="background-color: #4f6ef7; padding: 32px; text-align: center;">
                            <h1 style="margin: 0; font-family: 'Syne', sans-serif; font-size: 24px; font-weight: 800; color: #ffffff; letter-spacing: -0.5px;">
                                Code<span style="color: #dde6ff;">Bridge</span>
                            </h1>
                            <p style="margin: 8px 0 0 0; font-size: 14px; color: #dde6ff; font-weight: 500;">Restablecimiento de contraseña</p>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 40px 32px;">
                            <p style="margin: 0 0 16px 0; font-size: 16px; line-height: 1.6; color: #334155;">
                                ¡Hola, <strong>{{ $name }}</strong>!
                            </p>
                            <p style="margin: 0 0 24px 0; font-size: 16px; line-height: 1.6; color: #334155;">
                                Recibimos una solicitud para restablecer la contraseña de tu cuenta en <strong>CodeBridge</strong>. Hacé clic en el botón de abajo para crear una nueva contraseña.
                            </p>

                            <!-- Button -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 32px;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ $resetUrl }}" style="display: inline-block; background-color: #4f6ef7; color: #ffffff; font-family: 'Syne', sans-serif; font-size: 16px; font-weight: 700; text-decoration: none; padding: 14px 40px; border-radius: 12px; letter-spacing: 0.3px;">
                                            Restablecer contraseña
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin: 0 0 16px 0; font-size: 14px; line-height: 1.6; color: #64748b;">
                                Si no solicitaste este cambio, podés ignorar este correo. Tu contraseña actual seguirá siendo válida.
                            </p>
                            <p style="margin: 0; font-size: 14px; line-height: 1.6; color: #64748b;">
                                El enlace de restablecimiento expira en <strong>60 minutos</strong>.
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f8fafc; padding: 24px 32px; border-top: 1px solid #e2e8f0; text-align: center;">
                            <p style="margin: 0; font-size: 12px; color: #94a3b8; line-height: 1.5;">
                                Este correo fue enviado automáticamente por el sistema de CodeBridge.<br>
                                &copy; {{ date('Y') }} CodeBridge. Todos los derechos reservados.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
